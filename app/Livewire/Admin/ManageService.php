<?php

namespace App\Livewire\Admin;

use App\Models\Requirement;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.admin-layout')]
#[On('manage-service')]
class ManageService extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name;
    public $image;
    public $description;
 
    public function saveService()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
        ]);
      

        Service::create([
            'name' => $this->name,
            'image' =>  $this->image->store(path: 'image'),
            'description' => $this->description,
        ]);

      
        session()->flash('message', 'Service Created Successfully!');
        $this->dispatch('manage-service');

        $this->reset();
    }

    public function deleteService(Service $service){

        $service->delete();
        $this->render();

    }
    public function render()
    {
        return view('livewire.admin.manage-service', [
            "services" => Service::paginate(10)
        ]);
    }
}
