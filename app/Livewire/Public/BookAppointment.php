<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Appointment;
use App\Models\ServiceOn;
use App\Models\Requirement;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;

class BookAppointment extends Component
{
    public $name = '';
    public $contact_no, $address, $landmark, $city, $state, $pincode, $pref_date, $time;
    public  $requirementId = [];
    public $requirementsData = [];
    public $service;
    public $selectedServiceOn = null;
    public $selectedRequirements = [];
 

    #[Url]
    public $requirements = [];

    #[Url]
    public $serviceOnId;

    public function mount($serviceId = null, $serviceOnId = null , $requirements = null)
    {
        
        if ($serviceId) {
            $this->service = Service::find($serviceId);

            if (!$this->service) {
                abort(404, 'Service not found');
            }
        }

        $this->service = Service::with(['serviceOn', 'requirements'])->findOrFail($serviceId);
        
        if ($serviceOnId) {
            $this->selectedServiceOn = ServiceOn::findOrFail($serviceOnId);
        }

        if ($requirements) {
            $requirementIds = explode(',', $requirements);
            $this->selectedRequirements = Requirement::whereIn('id', $requirementIds)->get();
        }
    }

    
    public function toggleRequirement($id)
    {
        if (in_array($id, $this->requirementId)) {

            $this->requirementId = array_filter($this->requirementId, fn($value) => $value != $id);
        } else {

            $this->requirementId[] = $id;
        }
    }
    public function bookAppointment()
{
    try {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'contact_no' => 'required|digits:10',
            'address' => 'required|min:5',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required|digits:6',
            'pref_date' => 'required|date|after_or_equal:today',
            'time' => 'required',
        ]);

        // Log validation data for debugging
        \Log::info('Validation passed', $validated);

        // Generate unique job number
        $jobNo = 'JR' . date('ymd') . strtoupper(Str::random(4));

        // Create appointment with error checking
        $appointmentData = [
            'job_no' => $jobNo,
            'user_id' => Auth::id() ?? null,
            'service_id' => $this->service->id ?? null,
            'service_on_id' => $this->selectedServiceOn?->id ?? null,
            'pref_date' => $this->pref_date,
            'time' => $this->time,
            'name' => $this->name,
            'contact_no' => $this->contact_no,
            'address' => $this->address,
            'landmark' => $this->landmark ?? null,
            'city' => $this->city,
            'state' => $this->state,
            'pincode' => $this->pincode,
            'status' => 'pending',
        ];

        // Log appointment data
        \Log::info('Creating appointment with data:', $appointmentData);

        $appointment = Appointment::create($appointmentData);

        if (!$appointment) {
            throw new \Exception('Failed to create appointment');
        }

        // Attach requirements if any
        if (!empty($this->selectedRequirements)) {
            $appointment->requirements()->attach(
                collect($this->selectedRequirements)->pluck('id')->toArray()
            );
        }

        session()->flash('success', 'Appointment booked successfully!');
        
        // Add logging before redirect
        \Log::info('Redirecting to success page', ['jobNumber' => $jobNo]);
        
        return redirect()->route('booking.success', ['jobNumber' => $jobNo]);

    } catch (\Exception $e) {
        // Log the error
        \Log::error('Appointment booking failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        session()->flash('error', 'Failed to book appointment: ' . $e->getMessage());
        return null;
    }
}
    public function render()
    {
        return view('livewire.public.book-appointment', [
            'selectedRequirements' => $this->selectedRequirements,
        ]);
    }
}
