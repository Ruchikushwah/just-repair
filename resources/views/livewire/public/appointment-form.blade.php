<div>
    <form wire:submit="bookService" class="space-y-4">
        @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded-lg text-sm">
            {{ session('error') }}
        </div>
        @endif
        @if($showSuccessModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full">
                <!-- ...existing modal content... -->
                <button wire:click="closeSuccessModal" class="mt-4 px-4 py-2 bg-gray-200 rounded-lg">
                    your booking has been successfully submitted
                </button>
            </div>
        </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name
                    *</label>
                <input type="text" id="name" wire:model.blur="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                    placeholder="Your Name">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone
                    Number *</label>
                <input type="tel" id="phone" wire:model.blur="phone"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                    placeholder="10-digit mobile number">
                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="service" class="block text-gray-700 text-sm font-medium mb-2">Select
                Service *</label>
            <select id="service" wire:model.live="selectedService" wire:change="loadServiceOns"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                <option value="">Select a service</option>
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            @error('selectedService') <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        @if(!empty($serviceOns))
        <div>
            <label for="service_on" class="block text-gray-700 text-sm font-medium mb-2">Select
                Type/Model *</label>
            <select id="service_on" wire:model.live="selectedServiceOn" wire:change="loadServiceFees"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                <option value="">Select type or model</option>
                @foreach($serviceOns as $serviceOn)
                <option value="{{ $serviceOn->id }}">{{ $serviceOn->name }}</option>
                @endforeach
            </select>
            @error('selectedServiceOn') <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        @endif

        <div>
            <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address
                *</label>
            <textarea id="address" wire:model.blur="address" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                placeholder="Your complete address"></textarea>
            @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Pincode Field (Move it first) -->
            <div>
                <label for="pincode" class="block text-gray-700 text-sm font-medium mb-2">Pincode *</label>
                <input type="text" id="pincode" wire:model.blur="pincode" wire:change="fetchLocationDetails"
                    maxlength="6"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                    placeholder="6-digit pincode">
                @error('pincode')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- City Field -->
            <div>
                <label for="city" class="block text-gray-700 text-sm font-medium mb-2">City *</label>
                <input type="text" id="city" wire:model.blur="city"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                    placeholder="City" readonly>
                @error('city')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- State Field -->
            <div>
                <label for="state" class="block text-gray-700 text-sm font-medium mb-2">State *</label>
                <input type="text" id="state" wire:model.blur="state"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                    placeholder="State" readonly>
                @error('state')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="landmark" class="block text-gray-700 text-sm font-medium mb-2">Landmark
                (Optional)</label>
            <input type="text" id="landmark" wire:model.blur="landmark"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                placeholder="Nearby landmark">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="date" class="block text-gray-700 text-sm font-medium mb-2">Preferred
                    Date *</label>
                <input type="date" id="date" wire:model.blur="date"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                @error('date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="time" class="block text-gray-700 text-sm font-medium mb-2">Preferred
                    Time *</label>
                <select id="time" wire:model.blur="time"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                    <option value="">Select time slot</option>
                    <option value="morning">Morning (9AM - 12PM)</option>
                    <option value="afternoon">Afternoon (12PM - 3PM)</option>
                    <option value="evening">Evening (3PM - 6PM)</option>
                </select>
                @error('time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="issue" class="block text-gray-700 text-sm font-medium mb-2">Issue
                Description (Optional)</label>
            <textarea id="issue" wire:model.blur="issue" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent"
                placeholder="Briefly describe the issue you're facing"></textarea>
        </div>

        <button type="submit" wire:loading.attr="disabled" wire:target="bookService"
            class="w-full bg-[#535C91] text-white py-3 rounded-lg font-semibold hover:bg-[#414A78] transition duration-300 flex items-center justify-center">
            <span wire:loading.remove wire:target="bookService">
                <i class="fas fa-tools mr-2"></i> Book Repair Service
            </span>
            <span wire:loading wire:target="bookService">
                <i class="fas fa-spinner fa-spin mr-2"></i> Processing...
            </span>
        </button>
        <p class="text-xs text-gray-500 text-center">By booking, you agree to our terms and
            services</p>
    </form>
</div>