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
    public $requirementId = []; // Initialize as an array
    public $name = '';
    public $contact_no, $address, $landmark, $city, $state, $pincode, $pref_date, $time;
    public $weekDays;
    public $selectedRequirements = []; // Initialize as an array

    public function mount($id)
    {
        $this->service = Service::with('serviceOn', 'serviceFees')->findOrFail($id);
        $this->weekDays = $this->generateWeekDays();
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

    public function updatedServiceOnId($value)
    {
        // Fetch requirements based on the selected serviceOnId
        $this->requirements = Requirement::where('service_on_id', $value)->get();
        $this->requirementId = []; // Reset requirementId
    }

    public function toggleRequirement($requirementId)
    {
        if (in_array($requirementId, $this->selectedRequirements)) {
            // Remove the requirement if it already exists
            $this->selectedRequirements = array_filter($this->selectedRequirements, fn($id) => $id != $requirementId);
        } else {
            // Add the requirement if it doesn't exist
            $this->selectedRequirements[] = $requirementId;
        }

        // Debugging: Log the selected requirements
        logger('Selected Requirements in ViewService:', $this->selectedRequirements);
    }
    public function selectService($serviceId)
    {
        // Store service ID in session
        session(['selected_service_id' => $serviceId]);
        
        // Redirect to booking form
        return redirect()->route('book-appointment', ['serviceId' => $serviceId]);
    }

    public function GetServiceOnId()
    {
        // Return the selected requirements (if needed)
        return $this->selectedRequirements;
    }

    public function render()
    {
        return view('livewire.public.view-service');
    }
}
