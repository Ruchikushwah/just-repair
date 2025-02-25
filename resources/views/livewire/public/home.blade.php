<div>
    <!-- Hero Banner -->
    <div class="container mx-auto py-12 px-20 mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <!-- Left Side: Heading & Description -->
            <div class="flex flex-col border p-8 rounded-lg border-slate-200">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-600 mb-2">What you Looking For?</h1>
                    <input type="search" class="w-full border border-slate-300   py-2 rounded-sm ">

                </div>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mt-8">
                    @foreach($services as $service)
                    <a href="{{ url('/service/' . $service->id) }}" class="block w-full">

                        <div class="flex flex-col items-center bg-slate-100  rounded-lg p-4 border border-[#535C91] border-b-2">
                            <!-- Service Icon -->
                            <img src="\ac.png" alt="{{ $service->name }}" class="w-16 h-16 mb-2 ">

                            <!-- Service Name -->
                            <h3 class="text-md font-semibold text-gray-800">{{ $service->name }}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
            <!-- Right Side: Image Grid -->
            <div class="grid grid-cols-2 gap-2">

                <img src="https://picsum.photos/400/400" alt="Service 1" class="rounded-tl-lg">

                <img src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg" alt="Service 2" class="rounded-tr-lg">
                <img src="https://picsum.photos/400/300" alt="Service 3" class="rounded-bl-lg">
                <img src="https://picsum.photos/400/400" alt="Service 4" class="rounded-br-lg -mt-22">
            </div>
        </div>

    </div>

    <footer class="fixed bottom-0 w-full bg-white border-slate-200 py-3">
        <div class="container mx-auto flex justify-center space-x-8 items-center text-gray-600">
            <a href="/" class="flex flex-col items-center hover:text-gray-800">
                <i class="fa-solid fa-house "></i>
                <span class="text-sm">Home</span>
            </a>

            <a href="/my-bookings" class="flex flex-col items-center hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 4h14M9 12h6m-6 4h6" />
                </svg>
                <span class="text-sm">My Booking</span>
            </a>

            <a href="https://wa.me/your-number" target="_blank" class="flex flex-col items-center hover:text-gray-800">
                <i class="fa-brands fa-whatsapp"></i>
                <span class="text-sm">WhatsApp</span>
            </a>

            <a href="tel:7280080080" class="flex flex-col items-center hover:text-gray-800">
                <i class="fa-solid fa-phone"></i>
                <span class="text-sm">7280080080</span>
            </a>
        </div>
    </footer>



</div>