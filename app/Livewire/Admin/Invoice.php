<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\ServiceFees;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Invoice as InvoiceModel;
use Illuminate\Support\Str;


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
    public function saveInvoice()
    {
        $this->isProcessing = true;

        try {        
            $invoice = InvoiceModel::create([
                'servicefees_id' => $this->serviceFees->id,
                'appointment_id' => $this->appointment->id,
                'total_amount' => $this->serviceFees->fees,
                'invoice_date' => now(),
                'service_date' => $this->appointment->pref_date
            ]);

            session()->flash('success', 'Invoice saved successfully!');
            $this->dispatch('invoice-saved');
        }
        catch (\Exception $e) {
            session()->flash('error', 'Failed to create invoice: ' . $e->getMessage());
        }
    }

    public function updatedSelectedFee($value): void
    {
        $this->selectedServiceFee = ServiceFees::find($value);
        $this->totalAmount = $this->selectedServiceFee ? $this->selectedServiceFee->fees : 0;
    }

    public function render()
    {
        return view('livewire.admin.invoice');
    }
}
