<?php

namespace App\Livewire\Public;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyBookig extends Component
{

    public function mount()
    {
        // Redirect to login if not authenticated
        if (!Auth::check()) {
            return redirect()->route('auth.login');
        }
    }
    public function render()
    {
        return view('livewire.public.my-bookig',[
            'appointments' => Appointment::where('user_id', Auth::id())->with(['service'])->latest()->get(),
        ]);
    }
}
