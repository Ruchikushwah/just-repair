<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin-layout')]
class Setting extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
    }
    public function updateProfile()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->name = $this->name;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();
        session()->flash('message', 'Profile updated successfully!');
    }
    #[Title('Admin | Setting')]
    public function render()
    {
         
        return view('livewire.admin.setting');
    }
}
