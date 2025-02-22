<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ManageAppointment extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-appointment');
    }
}
