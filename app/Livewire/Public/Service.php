<?php
namespace App\Livewire\Public;

use Livewire\Component;

class Service extends Component
{
    public $type;

    public function mount($type = null)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('livewire.public.service', ['type' => $this->type]);
    }
}