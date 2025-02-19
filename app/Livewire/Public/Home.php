<?php

namespace App\Livewire\Public;

use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public $services;
    public function mount()
    {
        $this->services = Service::all();
    }
    public function render()
    {
        return view('livewire.public.home');
    }
}
