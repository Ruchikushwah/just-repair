<div class="w-full mx-auto p-4 sm:p-6 md:p-8 bg-gradient-to-br from-gray-100 to-gray-50 rounded-xl">
    <div class="border border-slate-200 p-4 sm:p-6 md:p-8 rounded-xl">
        <!-- Header with Back Button and Message -->
        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
            <a href="{{ route('admin.manage-appointment') }}"
               class="font-medium bg-teal-600 text-white px-4 py-2 rounded-md text-center hover:bg-teal-700 transition-all">
                Back
            </a>

            @if (session()->has('message'))
            <div class="text-green-600 font-semibold text-sm sm:text-base">{{ session('message') }}</div>
            @endif
        </div>

        <!-- Appointment Title -->
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mt-6 mb-4 sm:mb-6">
            {{ $appointment->name }}'s Service Details
        </h2>

        <!-- Appointment Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 border-t border-gray-300 pt-4">
            <div class="min-w-full"><strong>Appointment ID:</strong> {{ $appointment->id }}</div>
            <div class="min-w-full"><strong>Complaint No:</strong> 
                <span class="bg-slate-500 text-white px-2 py-1 rounded text-sm">{{ $appointment->job_no }}</span>
            </div>
            <div class="min-w-full"><strong>Name:</strong> {{ $appointment->name }}</div>
            <div class="min-w-full"><strong>Service:</strong> {{ $appointment->service->name }}</div>
            <div class="min-w-full"><strong>Preferred Time:</strong> 
                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">
                    {{ \Carbon\Carbon::parse($appointment->pref_date)->format('Y-m-d (h A - h A)') }}
                </span>
            </div>
            <div class="min-w-full"><strong>Address:</strong> {{ $appointment->address }}</div>
            <div class="min-w-full"><strong>Created On:</strong> {{ $appointment->created_at->format('m/d/Y, h:i:s A') }}</div>
        </div>

        <!-- Current Status -->
        <div class="mt-6 border-t border-gray-300 pt-4">
            <label class="block text-base sm:text-lg font-medium text-gray-700">Current Status</label>
            <div class="flex items-center space-x-4 mt-2">
                <span class="px-3 py-1 rounded-lg bg-gray-200 text-gray-700 font-semibold text-sm sm:text-base">
                    {{ $appointment->status }}
                </span>
            </div>
        </div>

        <!-- Update Status -->
        <div class="mt-6 border-t border-gray-300 pt-4">
            <label for="status" class="block text-base sm:text-lg font-medium text-gray-700">Update Status</label>
            <div class="flex items-center space-x-4 mt-2">
                <select wire:model.change="newStatus" id="status"
                        class="w-full border border-gray-400 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 text-sm sm:text-base">
                    <option value="">{{ $appointment->status }}</option>
                    <option value="Pending">pending</option>
                    <option value="Process">process</option>
                    <option value="Accept">accept</option>
                    <option value="Reject">reject</option>
                    <option value="Done">Done</option>
                </select>
            </div>
        </div>

        <!-- Invoice Section (Conditional) -->
        @if($newStatus === 'Done')
        <div class="mt-8 p-4 sm:p-6 border border-green-400 bg-green-50 rounded-xl">
            <h3 class="text-lg sm:text-xl font-semibold mb-4">Invoice Information</h3>
            <div class="flex flex-col gap-4">
                <!-- Service Fee Dropdown -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Select service</label>
                    <select wire:model.change="selectedServiceFees"
                            class="w-full border border-gray-300 p-2 rounded-lg text-sm sm:text-base">
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
                </div>

                <!-- Custom Price Input -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2 text-sm sm:text-base">Enter Custom Price</label>
                    <input type="number" wire:model="price"
                           class="w-full border border-gray-300 p-2 rounded-lg text-sm sm:text-base">
                </div>

                <!-- Generate Invoice Button -->
                <button wire:click="generateInvoice"
                        class="w-full sm:w-auto px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all text-sm sm:text-base">
                    Proceed to Invoice
                </button>
            </div>
        </div>
        @endif
    </div>
</div>