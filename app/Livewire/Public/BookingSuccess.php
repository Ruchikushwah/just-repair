<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use Livewire\Component;

class BookingSuccess extends Component
{
    public $appointment;
    public $jobNumber;

    public function mount($jobNumber)
    {
        $this->jobNumber = $jobNumber;
        $this->appointment = Appointment::where('job_no', $jobNumber)
            ->with(['service', 'serviceOn'])
            ->firstOrFail();
    }
    //     if (!session('booking_success')) {
    //         return redirect()->route('homepage');
    //     }

    //     $this->appointment = Appointment::find(session('appointment_id'));
    //     $this->jobNumber = session('job_number');

    //     // Clear session after retrieving data
    //     session()->forget(['booking_success', 'appointment_id', 'job_number']);
    



    public function render()
    {
        return view('livewire.public.booking-success')
            ->layout('components.layouts.app');
    }
}

