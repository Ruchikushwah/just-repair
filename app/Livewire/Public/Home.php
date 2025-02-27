<?php

namespace App\Livewire\Public;

use App\Models\Banner;
use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public $services;
    public $banners;
    public function mount()
    {
        $this->services = Service::all();
        $this->banners = Banner::all();
    }
    public function render()
    {
        return view('livewire.public.home');
    }
}
