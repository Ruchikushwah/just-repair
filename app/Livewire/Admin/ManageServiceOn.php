<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceOn;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin-layout')]
class ManageServiceOn extends Component
{
    use WithPagination;

    #[Validate('required|exists:services,id')]
    public $service_id;

    #[Validate('required|string')]
    public $name = '';

    public $services = [];
    public $serviceOnId;

    public $isEditing = false;

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->services = Service::all();
    }

    public function save()
    {
        $this->validate();

        ServiceOn::create([
            'service_id' => $this->service_id,
            'name' => $this->name,
        ]);

        session()->flash('message', 'Service created successfully.');

        $this->resetForm();
    }

    public function editServiceOn(ServiceOn $serviceOn)
    {
        $this->serviceOnId = $serviceOn->id;
        $this->service_id = $serviceOn->service_id;
        $this->name = $serviceOn->name;

        $this->isEditing = true;
    }

    public function updateServiceOn()
    {
        $this->validate();

        $serviceOn = ServiceOn::findOrFail($this->serviceOnId);

        $serviceOn->update([
            'service_id' => $this->service_id,
            'name' => $this->name,
        ]);

        session()->flash('message', 'Service updated successfully.');

        $this->resetForm();
    }

    public function deleteServiceOn(ServiceOn $serviceOn)
    {
        $serviceOn->delete();

        session()->flash('message', 'Service deleted successfully.');
    }

    public function resetForm()
    {
        $this->reset(['service_id', 'name', 'serviceOnId', 'isEditing']);
        $this->getData();
    }

    public function render()
    {
        return view('livewire.admin.manage-service-on', [
            'serviceOns' => ServiceOn::paginate(10),
        ]);
    }
}
