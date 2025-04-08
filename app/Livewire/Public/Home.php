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
        $this->date = date('Y-m-d');
        
        // Pre-fill user data if logged in
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->phone = $user->phone ?? '';
        }
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
    
    public function loadServiceOns()
    {
        if (!empty($this->selectedService)) {
            $this->serviceOns = ServiceOn::where('service_id', $this->selectedService)->get();
            $this->serviceFees = ServiceFees::where('service_id', $this->selectedService)->get();
            $this->selectedServiceOn = null;
        } else {
            $this->serviceOns = [];
            $this->serviceFees = [];
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
        $this->selectedService = $serviceId;
        $this->loadServiceOns();
        
        // Scroll to booking form
        $this->dispatch('scrollToBookingForm');
    }
    
    public function bookService()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|digits:10',
            'selectedService' => 'required',
            'selectedServiceOn' => 'required',
            'address' => 'required|min:10',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|digits:6',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
        ]);
        
        // Generate unique job number
        $jobNo = 'JR' . date('ymd') . strtoupper(Str::random(4));
        
        // Get requirement ID if any
        $requirementId = null;
        $requirement = Requirement::where('service_id', $this->selectedService)
            ->where('service_on_id', $this->selectedServiceOn)
            ->first();
            
        if ($requirement) {
            $requirementId = $requirement->id;
        }
        
        // Create appointment
        $appointment = Appointment::create([
            'job_no' => $jobNo,
            'user_id' => Auth::id(),
            'service_id' => $this->selectedService,
            'service_on_id' => $this->selectedServiceOn,
            'requirement_id' => $requirementId,
            'pref_date' => $this->date,
            'time' => $this->time,
            'name' => $this->name,
            'contact_no' => $this->phone,
            'address' => $this->address,
            'landmark' => $this->landmark,
            'city' => $this->city,
            'state' => $this->state,
            'pincode' => $this->pincode,
            'status' => 'pending',
        ]);
        
        // Show success modal
        $this->jobId = $jobNo;
        $this->showSuccessModal = true;
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
}
