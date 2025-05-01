<div class="p-4 sm:p-6">
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 space-y-4 sm:space-y-0">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Manage Invoices</h2>
        <div class="flex gap-4">
            <input wire:model.live="dateFilter" type="date"
                class="w-full sm:w-48 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
        </div>
    </div>

    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <!-- Table for larger screens -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Id
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Service
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Service Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($invoices as $index => $invoice)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $invoice->serviceFee->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $invoice->appointment->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ₹{{ number_format($invoice->total_amount, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $invoice->service_date->format('M d, Y') }}
                        </td>
                        <td class="px-4 sm:px-6 py-3">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.invoice', ['appointmentId' => $invoice->appointment->id, 'selectedServiceFees' => $invoice->serviceFee->id]) }}"
                                  class="bg-green-600 text-white px-3 py-1 rounded-md text-xs hover:bg-green-700">
                                    View
                                </a>
                                <button 
                                    wire:click="deleteInvoice({{ $invoice->id }})"
                                    wire:confirm="Are you sure you want to delete this invoice?"
                                    class="bg-red-600 text-white px-3 py-1 rounded-md text-xs hover:bg-red-700"
                                >
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No invoices found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

   
        <div class="block sm:hidden">
            @forelse($invoices as $index => $invoice)
            <div class="border-b border-gray-200 p-4">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-medium text-gray-800">#{{ $index + 1 }}</span>
                    <span class="text-sm text-gray-500">{{ $invoice->service_date->format('M d, Y') }}</span>
                </div>
                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <span class="text-xs text-gray-500 uppercase">Service</span>
                        <p class="text-sm text-gray-800">{{ $invoice->serviceFee->name }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 uppercase">Customer</span>
                        <p class="text-sm text-gray-800">{{ $invoice->appointment->name }}</p>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 uppercase">Amount</span>
                        <p class="text-sm text-gray-800">₹{{ number_format($invoice->total_amount, 2) }}</p>
                    </div>
                </div>
                <div class="mt-3 flex items-center space-x-2">
                    <a href="{{ route('admin.invoice', ['appointmentId' => $invoice->appointment->id, 'selectedServiceFees' => $invoice->serviceFee->id]) }}"
                      class="bg-green-600 text-white px-2 py-1 rounded-md text-xs hover:bg-green-700">
                        View
                    </a>
                    <button 
                        wire:click="deleteInvoice({{ $invoice->id }})"
                        wire:confirm="Are you sure you want to delete this invoice?"
                        class="bg-red-600 text-white px-2 py-1 rounded-md text-xs hover:bg-red-700"
                    >
                        Delete
                    </button>
                </div>
            </div>
            @empty
            <div class="p-4 text-center text-gray-500">
                No invoices found
            </div>
            @endforelse
        </div>
    </div>

    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>