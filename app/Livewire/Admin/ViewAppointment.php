<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ViewAppointment extends Component
{

    public $appoint;
    public $newStatus;
    public $appointment;

    public function mount($appointmentId)
    {
        // Fetch the appointment based on the passed ID
        $this->appointment = Appointment::findOrFail($appointmentId);
    }

    public function updateStatus()
    {
        // Update the status of the appointment
        if ($this->appointment) {
            $this->appointment->update(['status' => $this->newStatus]);
            session()->flash('message', 'Status updated successfully.');
        }
    }

    public function render()
    {
        $appointments = Appointment::latest()->paginate(10);

        return view('livewire.admin.view-appointment', [
            'appointments' => $appointments
        ]);
    }
}
