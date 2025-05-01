<?php

namespace App\Livewire\Admin;
use Livewire\WithPagination;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Carbon\Carbon;
#[Layout('components.layouts.admin-layout')]

class ManageInvice extends Component
{
    use WithPagination;
    public $search = '';
    public $dateFilter = '';
    protected $queryString = ['search', 'dateFilter'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteInvoice($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->delete();
        
        session()->flash('message', 'Invoice deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.manage-invice', [
            'invoices' => Invoice::with(['serviceFee', 'appointment'])
                ->when($this->dateFilter, function($query) {
                    return $query->whereDate('service_date', Carbon::parse($this->dateFilter));
                })
                ->latest('invoice_date')
                ->paginate(10)
        ]);
    }
}