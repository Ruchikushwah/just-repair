<?php

namespace App\Livewire\Admin;

use App\Models\Requirement;
use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('components.layouts.admin-layout')]
#[On('manage-service')]
class ManageService extends Component
{
    use WithFileUploads;

    public $name;
    public $image;
    public $description;
    public $requirement = '';
    public $requirements = [];
    public $services = [];

    public function saveService()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'description' => 'required|string',
        ]);
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('image', 'public');
        }

        $service = Service::create([
            'name' => $this->name,
            'image' => $this->$imagePath,
            'description' => $this->description,
        ]);

        foreach ($this->requirements as $requirement) {
            Requirement::create([
                'service_id' => $service->id,
                'requirement_name' => $requirement,
            ]);
        }
        session()->flash('message', 'Service Created Successfully!');
        $this->dispatch('manage-service');

        $this->reset();
    }
    public function addRequirement()
    {
        $this->requirements[] = $this->requirement;
        $this->requirement = '';
    }

    public function removeRequirement($index)
    {
        unset($this->requirements[$index]);
        $this->requirements = array_values($this->requirements);
    }

    public function mount()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        return view('livewire.admin.manage-service');
    }
}
