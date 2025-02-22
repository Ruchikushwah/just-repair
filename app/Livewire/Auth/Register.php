<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name, $email,  $contact ,$password, $password_confirmation;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users,email',
             'contact'=>'required|integar|max:10',
            'password' => 'required|min:6|confirmed',
           
        ];
    }
    public function register()
    {
        $validated = $this->validate(); // Run validation

        // Create user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact'=>$validated['contact'],
            'password' => Hash::make($validated['password']),
        ]);

        // Flash message & redirect
        session()->flash('success', 'Registration successful! You can now log in.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
