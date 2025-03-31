<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #1a1a1a;
    }

    .hero {
        background: linear-gradient(135deg, #e3f2fd, #ffffff);
    }

    .animate-fade-in {
        animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .image-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .image-hover:hover {
        transform: scale(1.08);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>
</head>

<div class=" bg-gray-50">
    <!-- Hero Section -->
    <section class="hero min-h-[700px] flex items-center bg-cover bg-center">
        <div class="container mx-auto px-8 py-10 mt-11">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Left Column: Text Content -->
                <div class="md:w-1/2 space-y-4 animate-fade-in">
                    <h1 class="text-4xl font-semibold leading-tight">
                        Expert Repair Services
                    </h1>
                    <p class="text-lg text-gray-700 tracking-wide">
                        Fast, reliable, and affordable repair services. Book an appointment today <br> and enjoy a hassle-free experience!
                    </p>
                    <div class="flex space-x-2">
                        <a href="#booking" class="bg-[#535C91] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#545e99] transition duration-300">
                            Book Now
                        </a>
                        <a href="#services" class="border border-[#535C91] text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-[#6c7296c8] hover:text-white transition duration-300">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Right Column: Image Gallery -->
                <div class="md:w-1/2 mt-10 md:mt-0">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg" alt="Repair 1" class="rounded-lg shadow-lg image-hover" />
                        <img src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg" alt="Repair 2" class="rounded-lg shadow-lg image-hover" />
                        <img src="\close-up-male-technician-hand-wearing-gloves-repairing-computer_23-2147922198.jpg" alt="Repair 3" class="rounded-lg shadow-lg image-hover" />
                        <img src="\repairman-doing-air-conditioner-service_1303-26541.avif" alt="Repair 4" class="rounded-lg shadow-lg image-hover" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section -->
    <section class="container mx-auto px-8 py-16">
        <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">Our Services</h2>


        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-8">
            @foreach($services as $service)
            <a href="{{ url('/service/' . $service->id) }}" class="block w-full transform hover:scale-105 transition-transform duration-300">
                <div class="flex flex-col items-center bg-gray-50 rounded-lg p-6 border border-[#535b88d2] border-b-4 hover:shadow-lg hover:bg-gray-100 transition-all">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-16 h-16 mb-4 object-cover">
                    <h3 class="text-md font-semibold text-gray-900 text-center">{{ $service->name }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </section>
    <section class="py-12 px-6 bg-slate-200">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-semibold text-center text-gray-900 mb-8">How We Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1: Select Service and Service Type -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-blue-100 rounded-full p-4 mb-4">
                            <i class="fas fa-tools text-blue-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Step 1</h3>
                        <p class="text-gray-600">Select your AC service and service type</p>
                    </div>
                </div>

                <!-- Step 2: Booking Confirmation -->
                <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-green-100 rounded-full p-4 mb-4">
                            <i class="fas fa-calendar-check text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Step 2</h3>
                        <p class="text-gray-600">Confirm your booking details</p>
                    </div>
                </div>

                <!-- Step 3: View Service Fees -->
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col items-center text-center">
                        <div class="bg-purple-100 rounded-full p-4 mb-4">
                            <i class="fas fa-money-bill-wave text-purple-600 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Step 3</h3>
                        <p class="text-gray-600">View and pay your service fees</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Section -->
    <section class="container mx-auto px-8 pb-16">
        <div class="mt-12 overflow-hidden relative">
            <!-- Scrolling Wrapper -->
            <div class="flex animate-scroll space-x-6">
                @foreach($banners as $banner)
                <div class="relative min-w-[60%] sm:min-w-[40%] md:min-w-[30%] h-60 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-lg font-semibold">{{ $banner->title }}</h3>
                        <p class="text-xs">{{ $banner->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Custom CSS for Automatic Scrolling -->
    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-scroll {
            display: flex;
            animation: scroll 20s linear infinite;
            /* Adjust the duration (20s) for faster/slower scrolling */
        }

        .animate-scroll:hover {
            animation-play-state: paused;
            /* Pause on hover */
        }
    </style>
    </section>

</div>