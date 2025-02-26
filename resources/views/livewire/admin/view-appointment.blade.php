<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Appointment Details</h1>

    <div class="space-y-4">
        <!-- Appointment Information -->
        <div class="bg-gray-50 p-6 rounded-lg ">
            <p class="text-lg font-medium text-gray-700"><strong>Service:</strong> {{ $appointment->service->name }}</p>
            <p class="text-lg font-medium text-gray-700"><strong>Customer Name:</strong> {{ $appointment->customer_name }}</p>
            <p class="text-lg font-medium text-gray-700"><strong>Appointment Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</p>
            <p class="text-lg font-medium text-gray-700"><strong>Status:</strong>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                    {{ $appointment->status == 'Pending' ? 'bg-yellow-500 text-white' : '' }}
                    {{ $appointment->status == 'process' ? 'bg-blue-500 text-white' : '' }}
                    {{ $appointment->status == 'accept' ? 'bg-green-500 text-white' : '' }}
                    {{ $appointment->status == 'reject' ? 'bg-red-500 text-white' : '' }}">
                    {{ $appointment->status }}
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Choose Status</label>
                        <select wire:model="newStatus" id="status" class="block w-full border border-gray-300 p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Pending">Pending</option>
                            <option value="process">Process</option>
                            <option value="accept">Accept</option>
                            <option value="reject">Reject</option>
                        </select>
                    </div>
                    <button wire:click="updateStatus" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Update Status
                    </button>


                </span>
            </p>
            <p class="text-lg font-medium text-gray-700"><strong>Notes:</strong> {{ $appointment->notes }}</p>
        </div>

        <!-- Status Update Form -->


    </div>

    <!-- Flash Message -->
    @if (session()->has('message'))
    <div class="mt-4 text-green-500 text-sm font-medium">
        {{ session('message') }}
    </div>
    @endif
</div>