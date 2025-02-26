<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin-layout')]
class ManageUser extends Component
{
    public function render()
    {
        
    

        // Pass the users to the view
        return view('livewire.admin.manage-user', [
            'users' => User::latest()->paginate(10)
         
        ]);
    }
}
