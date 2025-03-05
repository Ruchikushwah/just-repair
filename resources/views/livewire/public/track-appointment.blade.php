<div wire:poll.5s class="mt-16 py-10">
    <div class="relative max-w-lg mx-auto mt-8">
        <!-- Input Field with Animation -->
        <input type="text" wire:model="jobNo"
            class="peer p-3 border-2 border-blue-500 rounded-lg w-full text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-300" placeholder="Enter job number" />

        <!-- Search Button with Hover Animation -->
        <button wire:click="search"
            class="mt-4 w-full px-6 py-3 text-white bg-gradient-to-r from-blue-600 to-blue-500 rounded-lg transition-transform transform hover:scale-105 duration-300">
            Track Appointment
        </button>
    </div>

    @if ($appointment)
        <!-- Stepper UI -->
        <div class="mt-6 flex flex-col items-center justify-center space-y-4">
            <!-- Stepper Steps -->
            <div class="flex items-center w-full max-w-md">
                <!-- Step 1: Pending -->
                <div class="flex items-center relative">
                    <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $appointment->status === 'Pending' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        1
                    </div>
                    <div class="ml-2 text-sm font-medium {{ $appointment->status === 'Pending' ? 'text-blue-500' : 'text-gray-500' }}">Pending</div>
                </div>
                <div class="flex-auto border-t-2 {{ $appointment->status === 'In Progress' || $appointment->status === 'Completed' ? 'border-blue-500' : 'border-gray-300' }}"></div>

                <!-- Step 2: In Progress -->
                <div class="flex items-center relative">
                    <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $appointment->status === 'In Progress' ? 'bg-blue-500 text-white' : ($appointment->status === 'Completed' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600') }}">
                        2
                    </div>
                    <div class="ml-2 text-sm font-medium {{ $appointment->status === 'In Progress' || $appointment->status === 'Completed' ? 'text-blue-500' : 'text-gray-500' }}">In Progress</div>
                </div>
                <div class="flex-auto border-t-2 {{ $appointment->status === 'Completed' ? 'border-blue-500' : 'border-gray-300' }}"></div>

                <!-- Step 3: Completed -->
                <div class="flex items-center relative">
                    <div class="w-8 h-8 flex items-center justify-center rounded-full {{ $appointment->status === 'Completed' ? 'bg-blue-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                        3
                    </div>
                    <div class="ml-2 text-sm font-medium {{ $appointment->status === 'Completed' ? 'text-blue-500' : 'text-gray-500' }}">Completed</div>
                </div>
            </div>

            <!-- Status Text -->
            <p class="mt-4 text-center"><strong>Status:</strong> {{ $appointment->status }}</p>
        </div>
    @endif

    @if (session()->has('error'))
        <p class="text-red-600 mt-4">{{ session('error') }}</p>
    @endif
</div>