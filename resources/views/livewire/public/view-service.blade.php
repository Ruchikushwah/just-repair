<div class="container mx-auto px-6 py-12 mt-10 flex flex-wrap lg:flex-nowrap gap-10">

    <!-- Service Details -->
    <div class="w-full lg:w-1/2 text-[#434d85] rounded-lg overflow-hidden p-8  opacity-90 ">
        <h2 class="text-4xl  text-center font-medium mb-6">{{ $service->name }}</h2>

        <p class=" text-lg  text-center leading-relaxed mb-8">{{ $service->description }}</p>

        <ul class="text-sm space-y-4  items-center flex gap-3">
            <li class="flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                No Extra Cost
            </li>
            <li class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Free Inspection
            </li>
            <li class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                15 days Warranty *
            </li>
            <li class="flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Expert Technicians
            </li>
        </ul>
        <div class="mt-10">
            <h3 class="text-2xl font-semibold mb-4">Select Service Type</h3>

            <select wire:model.change="serviceOnId" class="p-3 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#535C91]" {{ $serviceOnId ? 'disabled' : '' }}>
                <option value="">Choose a service type</option>
                @foreach($service->serviceOn as $serviceOn)
                <option value="{{ $serviceOn->id }}">{{ $serviceOn->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4">Select Requirement</h3>

            <select wire:model.change="requirementId" class="p-3 border rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-[#535C91]" {{ $requirementId ? 'disabled' : '' }}>
                <option value="">Choose a requirement</option>
                @foreach($requirements as $requirement)
                <option value="{{ $requirement->id }}">{{ $requirement->requirement }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-full  mt-4 rounded-lg overflow-hidden p-8 text-black opacity-90 ">

            <h3 class="text-2xl font-semibold mb-6">Top Reasons to Book AC Repair Service in Purnea with JustRepair</h3>

            <ul class="text-lg space-y-4">
                <li><strong>Expert Technicians:</strong> Our team consists of skilled technicians who are experts in repairing ACs, refrigerators, home appliances, water purifiers, and more. They have the knowledge and experience to diagnose and fix issues quickly and effectively.</li>
                <li><strong>Wide Range of Services:</strong> JustRepair offers repair services for a variety of appliances, making us a one-stop solution for all your repair needs. Whether it's a faulty AC, a malfunctioning refrigerator, or a broken water purifier, we've got you covered.</li>
                <!-- <li><strong>Quality Parts:</strong> We use only high-quality parts for repairs to ensure the longevity and performance of your appliances. Our genuine parts help maintain the integrity of your appliance and provide lasting solutions.</li>
            <li><strong>Prompt Service:</strong> We understand the inconvenience of a malfunctioning appliance, which is why we strive to provide prompt service. Our technicians are quick to respond and work efficiently to get your appliance back in working condition as soon as possible.</li>
            <li><strong>Transparent Pricing:</strong> At JustRepair, we believe in transparency. We provide upfront pricing for our services, so you know exactly what to expect. There are no hidden costs or surprises, just honest and fair pricing.</li>
            <li><strong>Customer Satisfaction Guarantee:</strong> Your satisfaction is our priority. We go above and beyond to ensure that our customers are happy with our services. If you're not satisfied, we'll work with you to make it right.</li>
            <li><strong>Convenient Booking:</strong> Booking a service with JustRepair is easy and convenient. You can book online or by phone, and we'll schedule a service at a time that works best for you.</li>
            <li><strong>Emergency Services:</strong> For those urgent repair needs, we offer emergency services. Whether it's a broken AC in the middle of summer or a malfunctioning refrigerator, you can count on us to be there when you need us most.</li>
            <li><strong>Licensed and Insured:</strong> JustRepair is a licensed and insured company, giving you peace of mind knowing that your appliances are in good hands.</li>
            <li><strong>Locally Owned and Operated:</strong> We are proud to be a locally owned and operated business, serving the community of Purnea, Bihar. Supporting local businesses means supporting your community, and we thank you for choosing JustRepair for your repair needs.</li> -->
            </ul>
        </div>
    </div>

    <!-- Book Appointment Form -->
    <div class="w-full   lg:w-1/2 px-8 py-6 rounded-lg shadow bg-slate-100">
        <h2 class="text-3xl font-seminbold text-center text-slate-400 mb-8">Book <span class="text-[#ff0080e7]">{{$service->name}} </span>Service</h2>
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

</div>