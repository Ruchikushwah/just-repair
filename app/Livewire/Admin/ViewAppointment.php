<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Requirement;
use App\Models\Service;
use App\Models\ServiceFees;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ViewAppointment extends Component
{
    public $appointment;
    public $newStatus;
    public $price = 0;
    public $selectedServiceFees;
    public $requirements = [];
    public $serviceFeeName = '';
    public $services;
    public $appointments;

    public function mount($appointmentId)
    {
        $this->appointment = Appointment::with('service.serviceFees')
            ->where('id', $appointmentId)
            ->first();

        $this->newStatus = $this->appointment->status;
        $this->appointments = $this->appointment ? [$this->appointment] : [];
    }

    // Update the appointment status
    public function updatednewStatus()
    {
        if ($this->newStatus) {
            $this->appointment->update(['status' => $this->newStatus]);

            // Ensure event is dispatched correctly
            $this->dispatch('appointmentUpdated', $this->appointment->id);
            session()->flash('message', 'Status updated successfully.');
        }
    }

    // Update price when service fee is selected
    public function updatedselectedServiceFees($value)
    {
        $serviceFee = ServiceFees::find($value);
        $this->price = $serviceFee?->fees ?? 0;
    }

    public function generateInvoice()
    {
        $this->validate([
            'price' => 'required|numeric|min:0',
        ]);

        $this->redirectRoute('admin.invoice', [
            'appointmentId' => $this->appointment->id,
            'selectedServiceFees' => $this->selectedServiceFees,
        ]);
        // return redirect()->route('admin.invoice', ['appointmentId' => $this->appointment->id]);
    }

    public function render()
    {
        return view('livewire.admin.view-appointment');
    }
}
