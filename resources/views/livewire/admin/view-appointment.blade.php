<div class="w-full mx-auto p-8 bg-gradient-to-br from-gray-100 to-gray-50 rounded-xl">
    <div class="border border-slate-200 p-8 rounded-xl">

        <div class="flex justify-between">
            <a href="{{ route('admin.manage-appointment') }}" class="font-medium bg-teal-600 text-white px-4 py-1 mb-4 rounded-md">Back</a>

            @if (session()->has('message'))
            <div class="text-green-600 font-semibold">{{ session('message') }}</div>
            @endif
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">{{ $appointment->name }}'s Service Details</h2>

        <!-- Appointment Details -->
        <div class="grid grid-cols-2 gap-6 border-t border-gray-300 pt-4">
            <div><strong>Appointment ID:</strong> {{ $appointment->id }}</div>
            <div><strong>Complaint No:</strong> <span class="bg-slate-500 text-white px-2 py-1 rounded">{{ $appointment->job_no }}</span></div>
            <div><strong>Name:</strong> {{ $appointment->name }}</div>
            <div><strong>Service:</strong> {{ $appointment->service->name }}</div>
            <div><strong>Preferred Time:</strong> <span class="bg-yellow-500 text-white px-2 py-1 rounded">
                    {{ \Carbon\Carbon::parse($appointment->pref_date)->format('Y-m-d (h A - h A)') }}
                </span></div>
            <div><strong>Address:</strong> {{ $appointment->address }}</div>
            <div><strong>Created On:</strong> {{ $appointment->created_at->format('m/d/Y, h:i:s A') }}</div>
        </div>

        <!-- Current Status -->
        <div class="mt-6 border-t border-gray-300 pt-4">
            <label class="block text-lg font-medium text-gray-700">Current Status</label>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-3 py-1 rounded-lg bg-gray-200 text-gray-700 font-semibold">{{ $appointment->status }}</span>
            </div>
        </div>

        <!-- Update Status -->
        <div class="mt-6 border-t border-gray-300 pt-4">
            <label for="status" class="block text-lg font-medium text-gray-700">Update Status</label>
            <div class="flex items-center space-x-4 mt-2">
                <select wire:model.change="newStatus" id="status" class="w-full border border-gray-400 p-3 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">{{ $appointment->status }}</option>
                    <option value="Pending">pending</option>
                    <option value="Process">process</option>
                    <option value="Accept">accept</option>
                    <option value="Reject">reject</option>
                    <option value="Done">Done</option>
                </select>
            </div>
        </div>

        @if($newStatus === 'Done')

        <div class="mt-8 p-6 border border-green-400 bg-green-50 rounded-xl">
            <h3 class="text-xl font-semibold mb-4">Invoice Information</h3>
            <div>
                <!-- Service Fee Dropdown -->
                <label class="block text-gray-700 font-medium mb-2">Select service</label>
                <select wire:model.change="selectedServiceFees" class="w-full border border-gray-300 p-2 rounded-lg">
                    <option value="">Choose a service</option>

                    @foreach($appointments as $appointment)
                    @if($appointment->service && $appointment->service->serviceFees)
                    <optgroup label="{{ strtoupper($appointment->service->name) }}">
                        @foreach($appointment->service->serviceFees as $serviceFee)
                        <option value="{{ $serviceFee->id }}">
                            -- {{ $serviceFee->name }} (₹{{ $serviceFee->fees ?? 0 }})
                        </option>
                        @endforeach
                    </optgroup>
                    @endif
                    @endforeach
                </select>
                <!-- Custom Price Input (Auto-updated) -->
                <div class="mt-4">
                    <label class="block text-gray-700 font-medium mb-2">Enter Custom Price</label>
                    <input type="number" wire:model="price" class="w-full border border-gray-300 p-2 rounded-lg">
                </div>
            </div>

            <!-- Generate Invoice Button -->
            <button wire:click="generateInvoice" class="mt-4 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all">
                Proceed to Invoice
            </button>
        </div>
        @endif

    </div>
</div>