<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin-layout')]
class ManageAppointment extends Component
{
    use WithPagination;

    public $search = '';
    public $filter;

    public function updated($property)
    {
        if (in_array($property, ['filter', 'search'])) {
            $this->resetPage();
        }
    }

    public function deleteAppointment(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('message', 'Appointment deleted successfully.');
    }

    public function viewAppointment($id)
    {
        return redirect()->route('admin.view-appointment', ['appointmentId' => $id]);
    }

    public function updatedFilter()
    {
       
        $this->filterAppointments();
    }

    public function filterAppointments()
    {
        $query = Appointment::with(['service', 'serviceOn', 'requirement'])
            ->latest()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('contact_no', 'like', '%' . $this->search . '%');
            })
            ->when($this->filter, function ($query) {
                match ($this->filter) {
                    'today' => $query->whereDate('created_at', Carbon::today()),
                    'yesterday' => $query->whereDate('created_at', Carbon::yesterday()),
                    'last_week' => $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]),
                    'last_month' => $query->whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()]),
                    'last_year' => $query->whereBetween('created_at', [Carbon::now()->subYear(), Carbon::now()]),
                    default => null
                };
            });

        return $query->paginate(10);
    }

    #[Title('Admin |Manage Appointment')]
    public function render()
    {
        return view('livewire.admin.manage-appointment', [
            'appointments' => $this->filterAppointments(),
        ]);
    }
}
