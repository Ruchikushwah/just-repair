<div class="container mx-auto px-6 py-12">
    <!-- Service Details -->
    <div class="bg-white rounded-lg overflow-hidden">
        <h2 class="text-3xl font-bold">{{ $service->name }}</h2>
        <p class="text-gray-700 mt-2">{{ $service->description }}</p>
        <p class="text-xl font-bold mt-2">Fee: ₹{{ $service->service_fee }}</p>
    </div>
    <div class="mt-8">
        <h3 class="text-2xl font-bold">Select Service Type</h3>

        <select wire:model.change="serviceOnId" class="mt-2 p-2 border rounded-lg w-full">
            <option value="">Choose a service type</option>
            @foreach($service->serviceOn as $serviceOn)
            <option value="{{ $serviceOn->id }}">{{ $serviceOn->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Select Requirements (Dynamically Updated) -->
    @if($serviceOnId)
    <div class="mt-6">
        <h3 class="text-2xl font-bold">Select Requirement</h3>

        <select wire:model.change="requirementId" class="mt-2 p-2 border rounded-lg w-full">
            <option value="">Choose a requirement</option>
            @foreach($requirements as $requirement)
            <option value="{{ $requirement->id }}">{{ $requirement->requirement}}</option>
            @endforeach
        </select>
    </div>
    @endif



    @if($serviceOnId && $requirementId)
    <div class="mt-8 p-6 bg-gray-100 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Book Appointment</h2>

        @if(session()->has('success'))
        <div class="p-3 bg-green-200 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
        @endif

        <form wire:submit.prevent="bookAppointment">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block">Full Name</label>
                    <input type="text" wire:model="name" class="w-full p-2 border rounded-lg">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block">Contact Number</label>
                    <input type="text" wire:model="contact_no" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-2 border rounded-lg">
                    @error('contact_no') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block">Address</label>
                    <input type="text" wire:model="address" class="w-full p-2 border rounded-lg">
                    @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block">Landmark</label>
                    <input type="text" wire:model="landmark" class="w-full p-2 border rounded-lg">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-4">
                <div>
                    <label class="block">City</label>
                    <input type="text" wire:model="city" class="w-full p-2 border rounded-lg">
                    @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block">State</label>
                    <input type="text" wire:model="state" class="w-full p-2 border rounded-lg">
                    @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block">Pincode</label>
                    <input type="text" wire:model="pincode" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-2 border rounded-lg">
                    @error('pincode') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block">Preferred Date</label>
                    <input type="date" wire:model="pref_date" class="w-full p-2 border rounded-lg">
                    @error('pref_date') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block">Preferred Time</label>
                    <input type="time" wire:model="time" class="w-full p-2 border rounded-lg">
                    @error('time') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded-lg">
                Book Appointment
            </button>
        </form>
    </div>
    @endif
</div>