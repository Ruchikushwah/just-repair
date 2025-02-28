<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class Dashboard extends Component
{

    public $totalAppointments;
    public $totalServices;
    public $totalUsers;

    public $labels = [];
    public $data = [];
    public $appointmentLabels = [];
    public $appointmentData = [];

    public function mount()
    {
        $this->totalAppointments = Appointment::count();
        $this->totalServices = Service::count();
        $this->totalUsers = User::count();

        $this->fetchLoginData();
        $this->fetchAppointmentData();
    }
    public function fetchAppointmentData()
    {
        $monthlyData = collect(range(1, 12))->mapWithKeys(function ($month) {
            return [Carbon::create()->month($month)->format('F') => 0];
        });
        $appointments = Appointment::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $appointments->each(function ($item) use (&$monthlyData) {
            $monthName = Carbon::create()->month($item->month)->format('F');
            $monthlyData[$monthName] = $item->count;
        });
        $this->appointmentLabels = $monthlyData->keys()->toArray();
        $this->appointmentData = $monthlyData->values()->toArray();
    }

    public function fetchLoginData()
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $logins = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dateRange = collect(range(0, 6))->mapWithKeys(function ($day) {
            $date = Carbon::now()->subDays($day)->format('Y-m-d');
            return [$date => 0];
        })->reverse();

        $logins->each(function ($item) use (&$dateRange) {
            $dateRange[$item->date] = $item->count;
        });
        $this->labels = $dateRange->keys()->toArray();
        $this->data = $dateRange->values()->toArray();
    }

    #[Title('Admin | Dashboard')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
