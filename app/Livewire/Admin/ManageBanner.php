<?php

namespace App\Livewire\Admin;

use App\Models\Banner;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[On('manage-banner')]
#[Layout('components.layouts.admin-layout')]
class ManageBanner extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $image;
    public $isEditing = false;
    public $bannerId;


    public function save()
    {

        $this->validate([
            'image' => 'required|mimes:jpg,jpeg,png,gif,webp,avif|max:1024',
        ]);
        $imagePath = $this->image->store('banners', 'public');
        Banner::create([
            'image' => $imagePath,
        ]);
        session()->flash('message', 'Banner Created Successfully!');
        $this->dispatch('manage-banner');

        $this->reset();
    }
    public function editBanner($id)
    {
        $banner = Banner::findOrFail($id);
        $this->bannerId = $banner->id;

        $this->isEditing = true;
    }
    public function updateBanner()
    {

        $banner = Banner::findOrFail($this->bannerId);

        if ($this->image) {
            $imagePath = $this->image->store('banners', 'public');
            $banner->image = $imagePath;
        }

        $banner->update([

            'image' => $banner->image,
        ]);

        session()->flash('message', 'Banner updated successfully.');
    }


    public function render()
    {
        return view('livewire.admin.manage-banner', [
            'banners' => Banner::latest()->paginate(6)
        ]);
    }
}
