<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class Dashboard extends Component
{
    
    public $totalAppointments;
    public $totalServices;
    public $totalUsers;

    public function mount()
    {
        $this->totalAppointments = Appointment::count();
        $this->totalServices = Service::count();
        $this->totalUsers = User::count();
    }

  

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
