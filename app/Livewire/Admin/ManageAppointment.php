<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ManageAppointment extends Component
{
    public $search = '';



    public function deleteAppointment(Appointment $appointment)
    {

        $appointment->delete();
        session()->flash('message', 'Appointment deleted successfully.');
    }
    public function viewAppointment($id)
    {
        return redirect()->route('admin.view-appointment', ['appointmentId' => $id]);
    }
    public function render()
    {
        return view('livewire.admin.manage-appointment', [
            'appointments' => Appointment::with(['service', 'serviceOn', 'requirement'])
                ->latest()->when($this->search, function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                })->paginate(10),
        ]);
    }
}
