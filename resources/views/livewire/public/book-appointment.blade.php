<div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 p-4">
    <div class="w-full max-w-3xl bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
        <p class="text-md px-3 py-2 text-center">Your <span class="text-slate-600">{{ $service->name }}</span> Booking</p>
        <form wire:submit.prevent="bookAppointment" class="p-5">

            <!-- Service Details -->
            <p class="text-xl font-semibold mb-2 dark:text-white">{{ $service->name }}</p>
            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $service->description }}</p>

            <!-- Selected Service On -->
            @if($selectedServiceOn)
            <div class="mb-6">
                <p class="text-lg font-semibold dark:text-white">Selected Service Type:</p>
                <p class="dark:text-white">{{ $selectedServiceOn->name }}</p>
            </div>
            @endif

            <!-- Selected Requirements -->
            @if($selectedRequirements)
            <div class="mb-6">
                <p class="text-lg font-semibold dark:text-white">Selected Requirements:</p>
                <ul class="dark:text-white space-y-2">
                    @foreach($selectedRequirements as $req)
                    <li class="flex items-center gap-2">
                        <!-- Checkbox -->
                        <input type="checkbox" checked disabled class="w-5 h-5 text-[#535C91] rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-[#535C91]">
                        <!-- Requirement Text -->
                        <span>{{ $req->requirement }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Preferred Date & Time -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Preferred Date</label>
                    <input type="date" wire:model="pref_date" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('pref_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Preferred Time</label>
                    <input type="time" wire:model="time" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
            </div>

            <!-- Name & Contact -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Full Name</label>
                    <input type="text" wire:model="name" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Contact Number</label>
                    <input type="text" wire:model="contact_no" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('contact_no') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Address & Landmark -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Address</label>
                    <input type="text" wire:model="address" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Landmark</label>
                    <input type="text" wire:model="landmark" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
            </div>

            <!-- City, State & Pincode -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                <div>
                    <label class="block mb-2 font-medium dark:text-white">City</label>
                    <input type="text" wire:model="city" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-medium dark:text-white">State</label>
                    <input type="text" wire:model="state" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block mb-2 font-medium dark:text-white">Pincode</label>
                    <input type="text" wire:model="pincode" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91] dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    @error('pincode') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-[#ff0080] text-white px-6 py-3 w-full mt-4 rounded-full hover:bg-[#e60073] transition-all duration-300 shadow-md">
                Book Appointment
            </button>
        </form>
    </div>
</div>