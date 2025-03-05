<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\Attributes\On;

class TrackAppointment extends Component
{
    public $jobNo;
    public $appointment;

    public function search()
    {
        $this->validate(['jobNo' => 'required|string']);

        // Fetch the appointment by job number
        $this->appointment = Appointment::where('job_no', $this->jobNo)->first();

        if (!$this->appointment) {
            session()->flash('error', 'Appointment not found!');
            $this->appointment = null; // Clear appointment if not found
        }
    }

    #[On('appointmentUpdated')]
    public function refreshAppointment($appointmentId)
    {
        // Refresh the appointment if the ID matches
        if ($this->appointment && $this->appointment->id == $appointmentId) {
            $this->appointment->refresh();
        }
    }

    public function render()
    {
        return view('livewire.public.track-appointment');
    }
}