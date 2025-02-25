<?php

namespace App\Livewire\Admin;

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
    public $serviceId;
    public $existingImage;
    public $isEditing = false;
    public $search = '';

    public function saveService()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
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
    public function editService(Service $service)
    {
        $this->serviceId = $service->id;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->image = null;
        $this->existingImage = $service->image;
        $this->isEditing = true;
    }

    public function updateService()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
        ]);

        $service = Service::find($this->serviceId);

        $service->update([
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image ? $this->image->store('image', 'public') : $service->image,
        ]);

        session()->flash('message', 'Service Updated Successfully!');
        $this->dispatch('manage-service');

        $this->resetFields();
    }
    public function resetFields()
    {
        $this->reset(['name', 'image', 'description', 'isEditing', 'serviceId']);
    }

    public function deleteService(Service $serviceId)
    {
        $service = Service::findOrFail($serviceId);

        if ($service->serviceOns()->exists()) {
            session()->flash('error', 'Cannot delete: Service has related serviceons that need to be deleted first.');
            return;
        }
        $service->delete();
        session()->flash('message', 'Service deleted successfully!');
        $this->render();
    }

    public function render()
    {
        return view('livewire.admin.manage-service', [
            "services" => Service::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })->paginate(10)
        ]);
    }
}
