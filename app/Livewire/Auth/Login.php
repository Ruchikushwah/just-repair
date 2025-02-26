<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6', // Adjust the minimum password length as per your requirement
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            
            $user = Auth::user();
            session()->flash('message', 'Logged in successfully!');
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            
           
            return redirect()->route('homepage'); 
        } else {
            
            session()->flash('error', 'The provided credentials are incorrect.');
            return;
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('message', 'Logged out successfully!');
        return redirect()->route('homepage');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
