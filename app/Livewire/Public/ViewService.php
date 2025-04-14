<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use App\Models\Requirement;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ViewService extends Component
{
    public $service;
    public $serviceOnId;
    public $requirements = [];
    public $selectedRequirements = [];
    public $weekDays;
    public $timeSlots = [];
    
    public $name = '';
    public $contact_no, $address, $landmark, $city, $state, $pincode, $pref_date, $time;

    public function mount($id)
    {
        $this->service = Service::with('serviceOn', 'serviceFees')->findOrFail($id);
        $this->weekDays = $this->generateWeekDays();
        $this->timeSlots = $this->generateTimeSlots();
    }

    public function generateWeekDays()
    {
        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            $days[] = [
                'label' => $date->format('D d M'),
                'date' => $date->toDateString(),
            ];
        }
        return $days;
    }

    public function generateTimeSlots()
    {
        $slots = [];
        $start = Carbon::createFromTime(9, 0); // 9:00 AM
        $end = Carbon::createFromTime(17, 0); // 5:00 PM

        while ($start <= $end) {
            $slots[] = $start->format('H:i');
            $start->addHour();
        }

        return $slots;
    }

    public function selectTime($time)
    {
        $this->time = $this->time === $time ? null : $time; // Toggle selection
    }

    public function updatedServiceOnId($value)
    {
        $this->requirements = Requirement::where('service_on_id', $value)->get();
        $this->selectedRequirements = [];
    }

    public function toggleRequirement($requirementId)
    {
        if (in_array($requirementId, $this->selectedRequirements)) {
            $this->selectedRequirements = array_filter($this->selectedRequirements, fn($id) => $id != $requirementId);
        } else {
            $this->selectedRequirements[] = $requirementId;
        }
    }

    public function bookAppointment()
    {
        try {
            $validated = $this->validate([
                'name' => 'required|min:3|max:255',
                'contact_no' => 'required|digits:10',
                'address' => 'required|min:5|max:500',
                'landmark' => 'required|min:3|max:255',
                'city' => 'required|min:2|max:100',
                'state' => 'required|min:2|max:100',
                'pincode' => 'required|digits:6',
                'pref_date' => 'required|date|after_or_equal:today',
                'time' => 'required',
                'serviceOnId' => 'required|exists:service_ons,id',
                'selectedRequirements' => 'required|array|min:1',
            ]);

            $jobNo = 'JR' . date('ymd') . strtoupper(Str::random(4));

            $appointment = Appointment::create([
                'job_no' => $jobNo,
                'user_id' => Auth::id() ?? null,
                'service_id' => $this->service->id,
                'service_on_id' => $this->serviceOnId,
                'pref_date' => $this->pref_date,
                'time' => $this->time,
                'name' => $this->name,
                'contact_no' => $this->contact_no,
                'address' => $this->address,
                'landmark' => $this->landmark,
                'city' => $this->city,
                'state' => $this->state,
                'pincode' => $this->pincode,
                'status' => 'pending',
            ]);

            if (!empty($this->selectedRequirements)) {
                $appointment->requirements()->attach($this->selectedRequirements);
            }

            session()->flash('success', 'Appointment booked successfully!');
            return redirect()->route('booking.success', ['jobNumber' => $jobNo]);

        } catch (\Exception $e) {
            \Log::error('Appointment booking failed', ['error' => $e->getMessage()]);
            session()->flash('error', 'Failed to book appointment: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.public.view-service');
    }
}