<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\ServiceOn;
use App\Models\Requirement;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BookAppointment extends Component
{
    
    public $name = '';
    public $contact_no, $address, $landmark, $city, $state, $pincode, $pref_date, $time;
    public $serviceOnId, $requirementId;
    public $requirements = [];

    public function selectServiceOn($id)
    {
        $this->serviceOnId = $id;
        $this->requirements = Requirement::where('service_on_id', $id)->get();
    }

    public $services;  

    public function mount()
    {
        
        $this->services = Service::all(); 
    }

    public function toggleRequirement($id)
    {
        if (in_array($id, $this->requirementId)) {
            $this->requirementId = array_filter($this->requirementId, fn($value) => $value != $id);
        } else {
            $this->requirementId[] = $id;
        }
    }
    // Booking the Appointment
    public function bookAppointment()
    {
        // Validate the form data
        $this->validate([
            'serviceOnId' => 'required|exists:service_ons,id',
            'requirementId' => 'required|array|min:1',
            'name' => 'required|string|max:255',
            'contact_no' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required|string|max:500',
            'landmark' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'pref_date' => 'required|date',
            'time' => 'required',
        ]);

        // Create the appointment record
        Appointment::create([
            'user_id' => Auth::id(),
            'service_on_id' => $this->serviceOnId,
            'requirement_id' => implode(',', $this->requirementId), // Multiple requirement IDs as comma-separated string
            'job_no' => 'JR-' . strtoupper(Str::random(8)),
            'name' => $this->name,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'landmark' => $this->landmark,
            'city' => $this->city,
            'state' => $this->state,
            'pincode' => $this->pincode,
            'pref_date' => $this->pref_date,
            'time' => $this->time,
            'status' => 'process',
        ]);

       
        session()->flash('success', 'Appointment booked successfully!');

        // Reset form fields
        $this->reset([
            'serviceOnId',
            'requirementId',
            'name',
            'contact_no',
            'address',
            'landmark',
            'city',
            'state',
            'pincode',
            'pref_date',
            'time'
        ]);
    }

    public function render()
    {
        return view('livewire.public.book-appointment');
    }
}
