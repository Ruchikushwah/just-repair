<div>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col gap-6 mb-4 mt-10 md:mt-16">
        <!-- Service Header -->
        <div class="relative w-full h-64 sm:h-72 md:h-80 bg-cover bg-center rounded-lg overflow-hidden"
             style="background-image: url('/path/to/your/image.png');">
            <div class="absolute inset-0 bg-[#535C91] opacity-50"></div>
            <div class="relative z-10 w-full text-white p-4 sm:p-6 md:p-8">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4">{{ $service->name }}</h2>
                <p class="text-base sm:text-lg mb-6">{{ $service->description }}</p>
                <ul class="flex flex-wrap gap-4 text-sm">
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> No Extra Cost</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> Free Inspection</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> 15 days Warranty *</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> Expert Technicians</li>
                </ul>
            </div>
        </div>

        <!-- Tabs -->
        <div class="w-full">
            <div class="flex flex-wrap gap-4 border-b mb-4">
                <button class="tab-link px-2 py-1 text-sm sm:text-base" onclick="showTab('visit')">Book Free Visit</button>
                <button class="tab-link px-2 py-1 text-sm sm:text-base" onclick="showTab('pricing')">Our Pricing</button>
                <button class="tab-link px-2 py-1 text-sm sm:text-base" onclick="showTab('faq')">FAQ's</button>
            </div>

            <!-- Book Free Visit Tab -->
            <div id="visit" class="tab-content p-4 sm:p-6">
                @if (session()->has('error'))
                    <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="bg-green-100 text-green-600 p-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <h3 class="text-xl sm:text-2xl font-semibold mb-4">When do you need service?</h3>
                <select wire:model="pref_date"
                        class="p-3 border rounded-lg w-full mb-6 focus:outline-none focus:ring-2 focus:ring-[#535C91]">
                    <option value="">Select a date</option>
                    @foreach($weekDays as $day)
                        <option value="{{ $day['date'] }}">{{ $day['label'] }}</option>
                    @endforeach
                </select>
                @error('pref_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <div>
                    <h3 class="text-xl sm:text-2xl font-semibold mb-4">Select Service Type</h3>
                    <select wire:model.change="serviceOnId"
                            class="p-3 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#535C91]">
                        <option value="">Choose a service type</option>
                        @foreach($service->serviceOn as $serviceOn)
                            <option value="{{ $serviceOn->id }}">{{ $serviceOn->name }}</option>
                        @endforeach
                    </select>
                    @error('serviceOnId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <h3 class="text-xl sm:text-2xl font-semibold mb-2 mt-4">Requirement(s)</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                    @foreach($requirements as $req)
                        <label class="inline-flex items-center">
                            <input type="checkbox" wire:click="toggleRequirement({{ $req->id }})"
                                   {{ in_array($req->id, $selectedRequirements) ? 'checked' : '' }}
                                   class="h-5 w-5 text-[#535C91] focus:ring-[#535C91]">
                            <span class="ml-2 text-sm sm:text-base">{{ $req->requirement }}</span>
                        </label>
                    @endforeach
                </div>
                @error('selectedRequirements') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <!-- Booking Form -->
                <form wire:submit.prevent="bookAppointment" class="mt-6">
                    <p class="text-lg sm:text-xl font-semibold mb-2">Booking Details</p>
                    <p class="text-gray-600 mb-4 text-sm sm:text-base">Please fill in your details to confirm the appointment.</p>

                    <!-- Preferred Time Cards -->
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-sm sm:text-base">Preferred Time</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach($timeSlots as $slot)
                                <div wire:click="selectTime('{{ $slot }}')"
                                     class="p-3 border rounded-lg text-center cursor-pointer transition-all duration-200
                                            {{ $time === $slot ? 'bg-[#535C91] text-white border-[#535C91]' : 'bg-white border-gray-300' }}
                                            {{ !$serviceOnId || empty($selectedRequirements) ? 'opacity-60 cursor-not-allowed' : 'hover:bg-[#e6e8f0]' }}"
                                     {{ !$serviceOnId || empty($selectedRequirements) ? 'wire:click.prevent' : '' }}>
                                    {{ Carbon\Carbon::createFromFormat('H:i', $slot)->format('h:i A') }}
                                </div>
                            @endforeach
                        </div>
                        @error('time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name & Contact -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4">
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">Full Name</label>
                            <input type="text" wire:model="name"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">Contact Number</label>
                            <input type="text" wire:model="contact_no" maxlength="10" pattern="[0-9]*" inputmode="numeric"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('contact_no') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Address & Landmark -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4">
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">Address</label>
                            <input type="text" wire:model="address"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">Landmark</label>
                            <input type="text" wire:model="landmark"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('landmark') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- City, State, Pincode -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 mb-4">
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">City</label>
                            <input type="text" wire:model="city"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">State</label>
                            <input type="text" wire:model="state"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('state') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block mb-2 font-medium text-sm sm:text-base">Pincode</label>
                            <input type="text" wire:model="pincode" maxlength="6" pattern="[0-9]*" inputmode="numeric"
                                   class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#535C91]"
                                   {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                            @error('pincode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="bg-[#ff0080] text-white px-6 py-3 w-full mt-4 rounded-full hover:bg-[#e60073] transition-all duration-300 shadow-md disabled:opacity-70 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled" wire:target="bookAppointment"
                            {{ !$serviceOnId || empty($selectedRequirements) ? 'disabled' : '' }}>
                        <span wire:loading.remove wire:target="bookAppointment">
                            Book Appointment
                        </span>
                        <span wire:loading wire:target="bookAppointment">
                            Processing...
                        </span>
                    </button>
                </form>
            </div>

            <!-- Pricing Tab -->
            <div id="pricing" class="tab-content hidden p-4 sm:p-6">
                <h3 class="text-xl sm:text-2xl font-semibold mb-4">Selected Service Pricing</h3>
                <ul class="text-base sm:text-lg space-y-3">
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

            <!-- FAQ Tab -->
            <div id="faq" class="tab-content hidden p-4 sm:p-6">
                <h3 class="text-xl sm:text-2xl font-semibold mb-4">Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            What is included in the service?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            Full inspection and repair.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            Is there any hidden cost?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            No, we offer transparent pricing.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            How long does the service take?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            Service duration depends on the complexity, but most are completed within 1-2 hours.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            Do you offer a warranty?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            Yes, we provide a 6-month service warranty on all repairs.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            Can I reschedule my appointment?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            Absolutely! You can reschedule your appointment up to 24 hours in advance.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            What payment methods do you accept?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            We accept credit/debit cards, online payments, and cash on delivery.
                        </div>
                    </div>
                    <div class="border rounded-lg">
                        <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-base sm:text-lg font-semibold">
                            Is there customer support available?
                            <span class="plus-icon">+</span>
                        </button>
                        <div class="faq-content hidden p-4 text-gray-700 text-sm sm:text-base">
                            Yes, our customer support is available 24/7 to assist you.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll(".faq-toggle").forEach(button => {
            button.addEventListener("click", function () {
                const content = this.nextElementSibling;
                content.classList.toggle("hidden");
                const icon = this.querySelector(".plus-icon");
                icon.textContent = content.classList.contains("hidden") ? "+" : "-";
            });
        });

        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(tab).classList.remove('hidden');
        }
    </script>

    <style>
        .tab-link {
            padding-bottom: 8px;
            cursor: pointer;
            transition: border-bottom 0.2s ease;
        }

        .tab-link:hover {
            border-bottom: 2px solid #535C91;
        }

        input:disabled, select:disabled {
            background-color: #f3f4f6;
            cursor: not-allowed;
            opacity: 0.6;
        }

        @media (max-width: 640px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
</div>