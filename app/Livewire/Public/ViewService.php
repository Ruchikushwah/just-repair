<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use App\Models\Requirement;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewService extends Component
{

    public $service;
    public $serviceOnId;
    public $requirements = [];
    public $requirementId;
    public $name, $contact_no, $address, $landmark, $city, $state, $pincode, $pref_date, $time, $status;

    public function mount($id)
    {

        $this->service = Service::with('serviceOn')->findOrFail($id);
    }
    public function updatedServiceOnId($value)
    {
        $this->requirements = Requirement::where('service_on_id', $value)->get();
        $this->requirementId = null;
    }

    public function bookAppointment()
    {
        $this->validate([
            'serviceOnId' => 'required',
            'requirementId' => 'required',
            'name' => 'required|string',
            'contact_no' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required|string',
            'landmark' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|digits:6',
            'pref_date' => 'required|date',
            'time' => 'required',
        ]);
        Appointment::create([
            'user_id' => Auth::id(),
            'service_on_id' => $this->serviceOnId,
            'requirement_id' => $this->requirementId,
            'name' => $this->name,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'landmark' => $this->landmark,
            'city' => $this->city,
            'state' => $this->state,
            'pincode' => $this->pincode,
            'pref_date' => $this->pref_date,
            'time' => $this->time,
            'status' => $this->status,
        ]);
        session()->flash('success', 'Appointment booked successfully!');
        $this->reset(['requirementId', 'name', 'contact_no', 'address', 'landmark', 'city', 'state', 'pincode', 'pref_date', 'time']);
    }
    public function render()
    {
        return view('livewire.public.view-service');
    }
}
