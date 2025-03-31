<div>
    <div class="container flex-col mx-auto px-6 py-8 flex flex-wrap lg:flex-nowrap gap-10 mb-4 mt-10">
        <div class="relative w-full h-58 bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('/path/to/your/image.png');">
            <div class="absolute inset-0 bg-[#535C91] opacity-50"></div>
            <div class="relative z-10 w-full lg:w-1/2 text-white p-8">
                <h2 class="text-4xl font-semibold mb-4">{{ $service->name }}</h2>
                <p class="text-lg mb-6">{{ $service->description }}</p>

                <!-- Features -->
                <ul class="flex flex-wrap gap-4 text-sm">
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> No Extra Cost</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> Free Inspection</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> 15 days Warranty *</li>
                    <li class="flex items-center gap-2"><span class="text-green-400">✔</span> Expert Technicians</li>
                </ul>
            </div>
        </div>
        <!-- Tabs -->
        <div class="flex space-x-4 border-b mb-2">
            <button class="tab-link" onclick="showTab('visit')">Book Free Visit</button>
            <button class="tab-link" onclick="showTab('pricing')">Our Pricing</button>
            <button class="tab-link" onclick="showTab('faq')">FAQ's</button>
        </div>
        <!-- Book Free Visit (Default Tab) -->
        <div id="visit" class="tab-content">
            <h3 class="text-2xl font-semibold mb-4">When do you Need service?</h3>
            <select class="p-3 border rounded-lg w-full mb-6">
                @foreach($weekDays as $day)
                <option value="{{ $day['date'] }}">{{ $day['label'] }}</option>
                @endforeach

            </select>
            <div class="">
                <h3 class="text-2xl font-semibold mb-4">Select Service Type</h3>
                <select wire:model.change="serviceOnId" class="p-3 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#535C91]">
                    <option value="">Choose a service type</option>
                    @foreach($service->serviceOn as $serviceOn)
                    <option value="{{ $serviceOn->id }}">{{ $serviceOn->name }}</option>
                    @endforeach
                </select>
            </div>
            <h3 class="text-2xl font-semibold mb-2">Requirement(s)</h3>
            @foreach($requirements as $req)
            <label class="inline-flex items-center mb-4">
                <input type="checkbox" wire:click="toggleRequirement({{ $req->id }})"
                    {{ in_array($req->id, $requirementId) ? 'checked' : '' }}>
                <span class="ml-2">{{ $req->requirement }}</span>
            </label>
            @endforeach
        </div>
        @if(count($selectedRequirements) > 0)
        <a href="{{ route('book-appointment', ['serviceId' => $service->id, 'serviceOnId' =>$serviceOn->id, 'requirements' => implode(',', $selectedRequirements)]) }}"
            class="bg-[#5b3749] text-white px-6 py-3 rounded-full hover:bg-[#e60073] transition-all duration-300 shadow-md">
            Book Appointment
        </a>
        @endif
    </div>
    <div class="w-full rounded-lg overflow-hidden px-4 py-2 text-black opacity-90 ">
        <div id="pricing" class="tab-content hidden">
            <h3 class="text-2xl font-semibold mb-4">Selected Service Pricing</h3>
            <ul class="text-lg space-y-3">
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
        <div id="faq" class="tab-content hidden">
            <h3 class="text-2xl font-semibold mb-4">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        What is included in the service?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        Full inspection and repair.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        Is there any hidden cost?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        No, we offer transparent pricing.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        How long does the service take?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        Service duration depends on the complexity, but most are completed within 1-2 hours.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        Do you offer a warranty?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        Yes, we provide a 6-month service warranty on all repairs.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        Can I reschedule my appointment?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        Absolutely! You can reschedule your appointment up to 24 hours in advance.
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        What payment methods do you accept?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        We accept credit/debit cards, online payments, and cash on delivery.
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="border rounded-lg">
                    <button class="faq-toggle flex justify-between items-center w-full p-4 bg-gray-100 text-lg font-semibold">
                        Is there customer support available?
                        <span class="plus-icon">+</span>
                    </button>
                    <div class="faq-content hidden p-4 text-gray-700">
                        Yes, our customer support is available 24/7 to assist you.
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll(".faq-toggle").forEach(button => {
                button.addEventListener("click", function() {
                    const content = this.nextElementSibling;
                    content.classList.toggle("hidden");

                    const icon = this.querySelector(".plus-icon");
                    icon.textContent = content.classList.contains("hidden") ? "+" : "-";
                });
            });
        </script>
    </div>

    <script>
        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(tab).classList.remove('hidden');
        }
    </script>

    <style>
        .tab-link {
            padding-bottom: 8px;
            cursor: pointer;
        }

        .tab-link:hover {
            border-bottom: 2px solid #535C91;
        }
    </style>
</div>