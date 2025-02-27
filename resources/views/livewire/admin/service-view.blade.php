<div class=" w-full flex items-start justify-between space-x-6 p-8">
    <!-- Service Details Section -->
    <div class="w-6/12 bg-white shadow p-6 rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-teal-600">{{ $service->name }}</h1>
        <p class="text-gray-700 mt-2">{{ $service->description }}</p>

        <!-- Service On Section -->
        <section class="mt-6">
            <h2 class="text-2xl font-semibold text-teal-600">Service On</h2>
            <div class="mt-2">
                <ul class="list-disc pl-5 space-y-2 text-gray-800">
                    @forelse($service->serviceOn as $serviceO)
                    <li class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $serviceO->name }}</span>
                    </li>
                    @empty
                    <li class="text-gray-500">No Service On available.</li>
                    @endforelse
                </ul>
            </div>
        </section>

        <!-- Requirements Section -->
        <section class="mt-6">
            <h2 class="text-2xl font-semibold text-teal-600">Requirements</h2>
            <div class="mt-2">
                <ul class="list-disc pl-5 space-y-2 text-gray-800">
                    @forelse($service->requirements as $requirement)
                    <li class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $requirement->requirement }}</span>
                    </li>
                    @empty
                    <li class="text-gray-500">No Requirements available.</li>
                    @endforelse
                </ul>
            </div>
        </section>
    </div>


    <!-- Service Fees Section -->
    <div class="w-4/12 p-6 space-y-6 bg-white shadow rounded-lg mt-6">
        <h2 class="text-2xl font-semibold">Service Fees</h2>

        <!-- Service Fee Form -->
        <form wire:submit.prevent="addServiceFee">
            <div class="grid grid-cols-1 gap-4">
                <!-- Service Id (Readonly) -->
                <div>
                    <label for="serviceId" class="block text-sm font-medium text-gray-700">Service Id</label>
                    <input type="text" wire:model="service_id" value="{{ $service->id }}" readonly class="mt-1 block w-full p-2 border border-gray-200 rounded-md" />
                </div>

                <!-- Service Fee Name -->
                <div>
                    <label for="serviceFeeName" class="block text-sm font-medium text-gray-700">Service Fee Name</label>
                    <input type="text" wire:model="serviceFeeName" id="serviceFeeName" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required />
                    @error('serviceFeeName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Service Fee Amount -->
                <div>
                    <label for="serviceFeeAmount" class="block text-sm font-medium text-gray-700">Service Fee Amount</label>
                    <input type="number" wire:model="serviceFeeAmount" id="serviceFeeAmount" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required />
                    @error('serviceFeeAmount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="mt-4 bg-teal-600 text-white px-4 py-2 rounded-md">Submit</button>
            </div>
        </form>

        <!-- Success Message -->
        @if (session()->has('message'))
        <div class="mt-4 text-green-600">{{ session('message') }}</div>
        @endif
    </div>
    <div class="w-1/2 p-6 space-y-6 bg-white shadow rounded-lg mt-6">
        <h2 class="text-2xl font-semibold">{{ $service->name }}</h2>
        <div class="mt-4">
            <ul class="space-y-3">
                @forelse($service->serviceFees as $fee)
                <li class="flex justify-between text-gray-800">
                    <span>{{ $fee->name }}:</span>
                    <span>₹{{ number_format($fee->fees, 2) }}</span>
                </li>
                @empty
                <li class="text-gray-500">No Service Fees added.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>