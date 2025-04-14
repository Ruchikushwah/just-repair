<div class="w-full p-4 sm:p-6 lg:p-8">
    <!-- Header -->
    <div class="w-full flex justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-teal-600">View Service</h1>
        <button onclick="history.back()" class="flex items-center text-teal-600 hover:text-teal-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </button>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col lg:flex-row items-start justify-between space-y-6 lg:space-y-0 lg:space-x-6">
        <!-- Service Details Section -->
        <div class="w-full lg:w-6/12 bg-white shadow-md p-4 sm:p-6 rounded-lg">
            <h2 class="text-xl sm:text-2xl font-semibold text-teal-600">{{ $service->name }}</h2>
            <p class="text-gray-700 mt-2 text-sm sm:text-base">{{ $service->description }}</p>

            <!-- Service On Section -->
            <section class="mt-6">
                <h3 class="text-lg sm:text-xl font-semibold text-teal-600">Service On</h3>
                <ul class="list-disc pl-5 mt-2 space-y-2 text-gray-800 text-sm sm:text-base">
                    @forelse($service->service_ons as $serviceO)
                    <li class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $serviceO->name }}</span>
                    </li>
                    @empty
                    <li class="text-gray-500">No Service On available.</li>
                    @endforelse
                </ul>
            </section>

            <!-- Requirements Section -->
            <section class="mt-6">
                <h3 class="text-lg sm:text-xl font-semibold text-teal-600">Requirements</h3>
                <ul class="list-disc pl-5 mt-2 space-y-2 text-gray-800 text-sm sm:text-base">
                    @forelse($service->requirements as $requirement)
                    <li class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>{{ $requirement->requirement }}</span>
                    </li>
                    @empty
                    <li class="text-gray-500">No Requirements available.</li>
                    @endforelse
                </ul>
            </section>
        </div>

        <!-- Service Fees Section -->
        <div class="w-full lg:w-4/12 p-4 sm:p-6 space-y-6 bg-white shadow-md rounded-lg">
            <h3 class="text-lg sm:text-xl font-semibold text-teal-600">Service Fees</h3>

            <!-- Service Fee Form -->
            <form wire:submit.prevent="addServiceFee">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Service Id (Readonly) -->
                    <div>
                        <label for="serviceId" class="block text-sm font-medium text-gray-700">Service Name</label>
                        <input type="text" wire:model="service_id" value="{{ $service->name }}" readonly class="mt-1 block w-full p-2 border border-gray-200 rounded-md text-sm bg-gray-100" />
                    </div>

                    <!-- Service Fee Name -->
                    <div>
                        <label for="serviceFeeName" class="block text-sm font-medium text-gray-700">Service Fee Name</label>
                        <input type="text" wire:model="serviceFeeName" id="serviceFeeName" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm focus:ring-teal-500 focus:border-teal-500" required />
                        @error('serviceFeeName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Service Fee Amount -->
                    <div>
                        <label for="serviceFeeAmount" class="block text-sm font-medium text-gray-700">Service Fee Amount</label>
                        <input type="number" wire:model="serviceFeeAmount" id="serviceFeeAmount" class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-sm focus:ring-teal-500 focus:border-teal-500" required />
                        @error('serviceFeeAmount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="mt-4 bg-teal-600 text-white px-4 py-2 rounded-md text-sm hover:bg-teal-700 transition">Submit</button>
                </div>
            </form>

            <!-- Success Message -->
            @if (session()->has('message'))
            <div class="mt-4 text-green-600 text-sm">{{ session('message') }}</div>
            @endif
        </div>

        <!-- Service Fees List -->
        <div class="w-full lg:w-1/2 p-4 sm:p-6 space-y-6 bg-white shadow-md rounded-lg">
            <h3 class="text-lg sm:text-xl font-semibold text-teal-600">{{ $service->name }}</h3>
            <ul class="space-y-3 text-sm sm:text-base">
                @forelse($service->service_fees as $fee)
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