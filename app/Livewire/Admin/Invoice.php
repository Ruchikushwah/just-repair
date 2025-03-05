<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\ServiceFees;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class Invoice extends Component
{
    public $appointment;
    public $serviceFeesId;
    public $serviceFees;
    public $totalAmount;


    public $selectedServiceFee;

    // public function updatedSelected($serviceFeeId)
    // {
    //     $this->selectedServiceFee = ServiceFees::find($serviceFeeId);
    // }
    public function mount($appointmentId, $selectedServiceFees = NULL)
    {
        $this->appointment = Appointment::with('service')->findOrFail($appointmentId);

        if ($selectedServiceFees) {
            $this->serviceFees = ServiceFees::find($selectedServiceFees);
        }
    }
    public function updatedSelectedFee($value)
    {
        $this->selectedServiceFee = ServiceFees::find($value);
        $this->totalAmount = $this->selectedServiceFee ? $this->selectedServiceFee->fees : 0;
    }

    public function render()
    {

        return view('livewire.admin.invoice');
    }
}
