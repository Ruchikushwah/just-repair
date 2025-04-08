<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use Livewire\Component;

class BookingSuccess extends Component
{
    public $jobNumber;
    public $appointment;

    public function mount($jobNumber)
    {
        $this->jobNumber = $jobNumber;
        $this->appointment = Appointment::with(['service', 'serviceOn'])
            ->where('job_no', $jobNumber)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.public.booking-success')
            ->layout('components.layouts.app');
    }
}
