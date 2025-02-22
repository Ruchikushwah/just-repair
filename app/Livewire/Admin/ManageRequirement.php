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

    #[Validate('required|string|max:500')]
    public $requirement;

    public $services = [], $service_ons = [] ;

    public function save()
    {
        $this->validate();

        Requirement::create([
            'service_id' => $this->service_id,
            'service_on_id' => $this->service_on_id,
            'requirement' => $this->requirement,
        ]);

        session()->flash('message', 'Requirement added successfully.');
        $this->dispatch('refresh-requirement');
        $this->reset(['service_id', 'service_on_id', 'requirement']);
    }

    public function mount()
    {
        $this->services = Service::all();
        
    }

    public function updatedServiceId($id)
    {

        $this->service_ons = ServiceOn::where("service_id", $id)->get();
    }

    public function deleteRequirement(Requirement $req)
    {
        $req->delete();

    }
    public function render()
    {
        return view('livewire.admin.manage-requirement',[
            'requirements' =>Requirement::paginate(10)
        ]);
    }
}
