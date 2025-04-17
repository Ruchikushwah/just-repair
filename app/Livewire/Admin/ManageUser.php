<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.admin-layout')]
class ManageUser extends Component
{
    use WithPagination;

    
    public $filter = 'all';

    // Reset pagination when the filter changes
    public function updatingFilter()
    {
        $this->resetPage();
    }

    // User filtering logic
    public function getFilteredUsers()
    {
        return User::query()
        ->where('isAdmin', false)
            ->when($this->filter !== 'all', function ($query) {
                match ($this->filter) {
                    'today' => $query->whereDate('created_at', Carbon::today()),
                    'yesterday' => $query->whereDate('created_at', Carbon::yesterday()),
                    'last_week' => $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]),
                    'last_month' => $query->whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()]),
                    default => $query,
                };
            })
            ->latest()
            ->paginate(10);
    }
    #[Title('Admin | Manage User')]
    public function render()
    {
        return view('livewire.admin.manage-user', [
            'users' => $this->getFilteredUsers(),
        ]);
    }
}
