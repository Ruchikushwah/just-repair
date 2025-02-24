<?php

namespace App\Livewire\Admin;

use App\Models\Requirement;
use App\Models\Service;
use App\Models\ServiceOn;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
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

    // Load requirements
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

    // public function mount()
    // {
    //     $this->services = Service::all();
    // }

    public function updatedServiceId($id)
    {
        $this->service_ons = ServiceOn::where("service_id", $id)->get();
    }

    // public function addRequirement()
    // {
    //     $this->requirements[] = $this->requirement;
    //     $this->requirement = '';
    // }

    public function removeRequirement($index)
    {
        unset($this->requirementInputs[$index]); // Remove the requirement at the given index
        $this->requirementInputs = array_values($this->requirementInputs); // Reindex the array
    }

    public function deleteReq(Requirement $req)
    {
        $req->delete();
        $this->dispatch('refresh-requirement');
    }

    public function render()
    {
        $requirements = Requirement::with('service', 'serviceOn')->paginate(10);

        return view('livewire.admin.manage-requirement', [
            'requirements' => $requirements
        ]);
    }
}
