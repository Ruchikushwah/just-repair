<?php
namespace App\Livewire\Admin;

use App\Models\Requirement;
use App\Models\Service;
use App\Models\ServiceOn;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[On('refresh-requirement')]
#[Layout('components.layouts.admin-layout')]
class ManageRequirement extends Component
{
    use WithPagination;

    #[Validate('required|exists:services,id')]
    public $service_id;

    #[Validate('required|exists:service_ons,id')]
    public $service_on_id;

    #[Validate('required|string|max:255')]
    public $requirement = '';

    public $requirementInputs = [];
    public $services = [], $service_ons = [];
    public $search = '';
    
   
    public $editingRequirementId = null;
    public $editingRequirement = '';

    public function save()
    {
        $this->validate([
            'service_id' => 'required|exists:services,id',
            'service_on_id' => 'required|exists:service_ons,id',
            'requirementInputs' => 'required|array|min:1',
        ]);

        foreach ($this->requirementInputs as $requirement) {
            Requirement::create([
                'service_id' => $this->service_id,
                'service_on_id' => $this->service_on_id,
                'requirement' => $requirement,
            ]);
        }

        session()->flash('message', 'Requirements added successfully.');

        $this->reset('service_id', 'service_on_id', 'requirementInputs');
        $this->loadRequirements();
    }

    public function loadRequirements()
    {
        Requirement::with('service', 'serviceOn')->get();
    }

    public function deleteRequirement($id)
    {
        Requirement::findOrFail($id)->delete();
        $this->loadRequirements();
    }

    public function addRequirement()
    {
        if ($this->requirement) {
            $this->requirementInputs[] = $this->requirement;
            $this->requirement = '';
        }
    }

    public function mount()
    {
        $this->services = Service::all();
        $this->loadRequirements();
    }

    public function updatedServiceId($id)
    {
        $this->service_ons = ServiceOn::where("service_id", $id)->get();
    }

    public function removeRequirement($index)
    {
        unset($this->requirementInputs[$index]);
        $this->requirementInputs = array_values($this->requirementInputs);
    }

    public function deleteReq(Requirement $req)
    {
        $req->delete();
        $this->dispatch('refresh-requirement');
    }

    public function editRequirement($id)
    {
        $requirement = Requirement::findOrFail($id);
        $this->editingRequirementId = $id;
        $this->service_id = $requirement->service_id;
        $this->service_on_id = $requirement->service_on_id;
        $this->editingRequirement = $requirement->requirement;

       
        $this->service_ons = ServiceOn::where("service_id", $this->service_id)->get();

      
        $this->requirementInputs = [$requirement->requirement];
    }

 
    public function updateRequirement()
    {
        $this->validate([
            'service_id' => 'required|exists:services,id',
            'service_on_id' => 'required|exists:service_ons,id',
            'requirementInputs' => 'required|array|min:1',
        ]);

        $requirement = Requirement::findOrFail($this->editingRequirementId);
        $requirement->update([
            'service_id' => $this->service_id,
            'service_on_id' => $this->service_on_id,
            'requirement' => $this->requirementInputs[0],
        ]);

        session()->flash('message', 'Requirement updated successfully.');

        $this->reset('service_id', 'service_on_id', 'requirementInputs', 'editingRequirementId', 'editingRequirement');
        $this->loadRequirements();
    }

    #[Title('Admin | Manage Requirement')]
    public function render()
    {
        $requirements = Requirement::with(['service', 'serviceOn'])
            ->latest()
            ->when($this->search, function ($query) {
                $query->where('requirement', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.manage-requirement', [
            'requirements' => $requirements
        ]);
    }
}