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

    public function mount($serviceId)
    {
        $this->service = Service::with(['service_ons', 'requirements', 'service_fees'])->findOrFail($serviceId);
    }

    public function addServiceFee()
    {
        // Ensure the validation matches the property names
        $this->validate([
            'serviceFeeName' => 'required|string|max:255', // Corrected to match the property name
            'serviceFeeAmount' => 'required|numeric|min:0', // Corrected to match the property name
        ]);

        // Create the Service Fee with the correct data
        ServiceFees::create([
            'name' => $this->serviceFeeName,
            'fees' => $this->serviceFeeAmount,
            'service_id' => $this->service->id,
        ]);


        $this->reset(['serviceFeeName', 'serviceFeeAmount']);

        // Flash a success message
        session()->flash('message', 'Service Fee added successfully.');
    }

    public function render()
    {
        return view('livewire.admin.service-view', [
            'service' => $this->service,
        ]);
    }
}
