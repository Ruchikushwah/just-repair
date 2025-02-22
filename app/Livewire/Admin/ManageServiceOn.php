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

    public function save()
    {
        $this->validate();

        ServiceOn::create([
            'service_id' => $this->service_id,
            'name' => $this->name,
        ]);

        session()->flash('message', 'Service created successfully.');
        $this->reset(["service_id", "name"]);
        $this->getData();
    }

    public function getData(){
        $this->services = Service::all();
        // $this->serviceOns = ServiceOn::all();
    }
    public function mount()
    {
        $this->getData();
     
    }
    public function deleteServiceOn(ServiceOn $serviceOn)
    {
        $serviceOn->delete();
        $this->render();
    }
    public function render()
    {
        return view('livewire.admin.manage-service-on',[
            "serviceOns" => ServiceOn::paginate(10)
        ]);

    }
}
