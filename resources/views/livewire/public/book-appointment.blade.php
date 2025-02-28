<div class="w-full   lg:w-1/2 px-8 py-6 rounded-lg flex flex-col items-center mt-10">
    <h2 class="text-3xl font-seminbold text-center text-slate-400 mb-8">Book <span class="text-[#ff0080e7]"></span>Service</h2>
    <form wire:submit.prevent="bookAppointment">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-2 font-medium">Full Name</label>
                <input type="text" wire:model="name" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-2 font-medium">Contact Number</label>
                <input type="text" wire:model="contact_no" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('contact_no') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label class="block mb-2 font-medium">Address</label>
                <input type="text" wire:model="address" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-2 font-medium">Landmark</label>
                <input type="text" wire:model="landmark" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div>
                <label class="block mb-2 font-medium">City</label>
                <input type="text" wire:model="city" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-2 font-medium">State</label>
                <input type="text" wire:model="state" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('state') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block mb-2 font-medium">Pincode</label>
                <input type="text" wire:model="pincode" maxlength="10" pattern="[0-9]*" inputmode="numeric" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
                @error('pincode') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div>
            <label class="block mb-2 font-medium">Preferred Date</label>
            <input type="date" wire:model="pref_date" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
            @error('pref_date') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block mb-2 font-medium">Preferred Time</label>
            <input type="time" wire:model="time" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-[#535C91]">
        </div>

        <button type="submit" class="bg-[#ff0080] text-white px-6 py-3 w-full mt-8 rounded-full hover:bg-[#e60073] transition-all duration-300 shadow-md">
            Book Appointment
        </button>
    </form>
</div>