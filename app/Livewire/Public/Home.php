<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceOn;
use App\Models\ServiceFees;
use App\Models\Banner;
use App\Models\Appointment;
use App\Models\Requirement;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $name;
    public $phone;
    public $address;
    public $date;
    public $time;
    public $issue;
    public $city;
    public $state;
    public $pincode;
    public $landmark;
    
    // For dynamic service selection
    public $selectedService;
    public $selectedServiceOn;
    public $selectedServiceFee;
    
    // To store the loaded data
    public $serviceOns = [];
    public $serviceFees = [];
    
    // For success modal
    public $showSuccessModal = false;
    public $jobId;

    public function mount()
    {
        // dd("testing");
        $this->date = date('Y-m-d');
        
        // Pre-fill user data if logged in
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->phone = $user->phone ?? '';
        }
    }

    public function loadServiceFees()
    {
        if (!empty($this->selectedServiceOn)) {
            $this->serviceFees = ServiceFees::where('service_id', $this->selectedService)->get();
        }
    }
    
    public function selectService($serviceId)
    {
        try {
            // Find the service first
            $service = Service::findOrFail($serviceId);
            
            $this->selectedService = $service->id;
            $this->loadServiceOns();
            
            // Scroll to booking form
            $this->dispatch('scrollToBookingForm');
        } catch (\Exception $e) {
            session()->flash('error', 'Service not found');
        }
    }

    public function loadServiceOns()
    {
        if (!empty($this->selectedService)) {
            $this->serviceOns = ServiceOn::where('service_id', $this->selectedService)
                ->with('service') // Eager load the service relationship
                ->get();
            
            // Reset previous selections
            $this->selectedServiceOn = null;
            $this->serviceFees = [];
        }
    }
    public function closeSuccessModal()
    {
        $this->showSuccessModal = false;
        
        // Reset form
        $this->reset([
            'selectedService', 'selectedServiceOn', 'selectedServiceFee', 
            'address', 'time', 'issue', 'city', 'state', 'pincode', 'landmark'
        ]);
        
        if (!Auth::check()) {
            $this->reset(['name', 'phone']);
        }
        
        $this->date = date('Y-m-d');
    }

    public function render()
    {
        $services = Service::where('status', true)
            ->with(['service_ons', 'service_fees'])
            ->get();
            
        $banners = Banner::where('status', true)->get();
        
        return view('livewire.public.home', [
            'services' => $services,
            'banners' => $banners,
        ]);
    }
    
}