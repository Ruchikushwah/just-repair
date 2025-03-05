<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LETRepair - Expert Repair Services</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #ffffff; /* Light background */
                color: #1a1a1a; /* Dark text */
            }

            .hero {
                background: linear-gradient(135deg, #f0f0f0, #ffffff); /* Light gradient */
            }

            .animate-text {
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
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Dark shadow for light theme */
            }

            .parallax {
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            nav {
                background-color: #f8f9fa; /* Light nav background */
            }

            .text-blue-600 {
                color: #3b82f6; /* Keeping blue for contrast */
            }

            .bg-white {
                background-color: #ffffff; /* White background for buttons */
                color: #1a1a1a; /* Dark text */
            }

            .border-white {
                border-color: #1a1a1a; /* Dark border */
            }

            .hover\:bg-blue-50:hover {
                background-color: #bfdbfe; /* Lighter hover background */
            }

            .hover\:text-blue-600:hover {
                color: #3b82f6; /* Blue hover text */
            }
        </style>
    </head>

    <body class="bg-gray-100 mt-10">
        <!-- Hero Section -->
        <section class="hero text-gray-900 min-h-[600px] flex items-center">
            <div class="container mx-auto px-8">
                <div class="flex flex-col md:flex-row items-center">
                    <!-- Left Column: Text Content -->
                    <div class="md:w-1/2 space-y-6 animate-text">
                        <h1 class="text-5xl font-semibold leading-tight">
                            Expert Repair Services
                        </h1>
                        <p class="text-xl text-gray-700">
                            We provide fast, reliable, and affordable repair services. Book an appointment today and enjoy a comfortable home!
                        </p>
                        <div class="flex space-x-2">
                            <a
                                href="#booking"
                                class="bg-blue-600 border border-gray-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                                Book Now
                            </a>
                            <a
                                href="#services"
                                class="border border-gray-900 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-900 hover:text-white transition duration-300">
                                Learn More
                            </a>
                        </div>
                    </div>

                    <div class="md:w-1/2 mt-10 md:mt-0">
                        <div class="grid grid-cols-2 gap-4">
                            <img
                                src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg"
                                alt="Repair 1"
                                class="rounded-lg shadow-lg image-hover" />
                            <img
                                src="\close-up-male-technician-hand-wearing-gloves-repairing-computer_23-2147922198.jpg"
                                alt="Repair 2"
                                class="rounded-lg shadow-lg image-hover" />
                            <img
                                src="https://images.unsplash.com/photo-1627485937980-221c88ac04f9?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Repair 3"
                                class="rounded-lg shadow-lg image-hover" />
                            <img
                                src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg"
                                alt="Repair 1"
                                class="rounded-lg shadow-lg image-hover" />

                        </div>
                    </div>
                </div>
        </section>
        <div class="flex flex-col border p-8 rounded-lg border-gray-300 bg-white shadow-lg">
            <div>
                <h1 class="text-3xl font-semibold text-gray-900 mb-4">What Are You Looking For?</h1>
                <input type="search" placeholder="Search for services..." class="w-full border border-gray-300 bg-gray-50 text-gray-900 py-3 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all placeholder-gray-500">
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mt-8">
                @foreach($services as $service)
                <a href="{{ url('/service/' . $service->id) }}" class="block w-full transform hover:scale-105 transition-transform duration-300">
                    <div class="flex flex-col items-center bg-gray-50 rounded-lg p-6 border border-gray-200 border-b-4 hover:shadow-lg hover:bg-gray-100 transition-all">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-16 h-16 mb-4 object-cover">
                        <h3 class="text-md font-semibold text-gray-900 text-center">{{ $service->name }}</h3>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="mt-12 flex overflow-x-auto space-x-4 scrollbar-hide pb-4">
                @foreach($banners as $banner)
                <div class="relative min-w-[40%] md:min-w-[30%] h-72 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-xl font-semibold">{{ $banner->title }}</h3>
                        <p class="text-sm text-gray-300">{{ $banner->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>

    </html>
</div>