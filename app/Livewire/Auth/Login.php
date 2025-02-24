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
        $this->validate(); // Validate the data

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('message', 'Logged in successfully!');
            return redirect()->route('homepage'); 
        } else {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
