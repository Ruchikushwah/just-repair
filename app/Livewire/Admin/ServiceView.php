<?php

namespace App\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceFees;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ServiceView extends Component
{
    public $service;
    public $serviceFeeName;
    public $serviceFeeAmount;
    public $editingFeeId = null;

    public function mount($serviceId)
    {
        $this->service = Service::with(['service_ons', 'requirements', 'service_fees'])->findOrFail($serviceId);
    }

    public function addServiceFee()
    {
        $this->validate([
            'serviceFeeName' => 'required|string|max:255',
            'serviceFeeAmount' => 'required|numeric|min:0',
        ]);

        if ($this->editingFeeId) {
            // Update existing fee
            $fee = ServiceFees::findOrFail($this->editingFeeId);
            $fee->update([
                'name' => $this->serviceFeeName,
                'fees' => $this->serviceFeeAmount,
            ]);
            session()->flash('message', 'Service Fee updated successfully.');
        } else {
            // Create new fee
            ServiceFees::create([
                'name' => $this->serviceFeeName,
                'fees' => $this->serviceFeeAmount,
                'service_id' => $this->service->id,
            ]);
            session()->flash('message', 'Service Fee added successfully.');
        }

        $this->reset(['serviceFeeName', 'serviceFeeAmount', 'editingFeeId']);
    }

    public function editServiceFee($feeId)
    {
        $fee = ServiceFees::findOrFail($feeId);
        $this->serviceFeeName = $fee->name;
        $this->serviceFeeAmount = $fee->fees;
        $this->editingFeeId = $feeId;
    }

    public function deleteServiceFee($feeId)
    {
        $fee = ServiceFees::findOrFail($feeId);
        $fee->delete();
        session()->flash('message', 'Service Fee deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.service-view', [
            'service' => $this->service,
        ]);
    }
}