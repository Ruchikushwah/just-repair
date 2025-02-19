<div>
    <!-- Hero Banner -->
    <section class="relative w-full h-[400px] md:h-[500px] bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center text-white text-center">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold">Professional Repair Services</h1>
            <p class="mt-3 text-lg md:text-xl">Book trusted professionals for AC repair, TV installation, and more!</p>
            <a href="#services" class="mt-6 inline-block bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">View Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-800">Our Services</h2>
            <p class="text-center text-gray-600 mt-2">Choose from our wide range of repair and installation services.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                @foreach($services as $service)
                    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
                        <h3 class="text-xl font-semibold">{{ $service->name }}</h3>
                        <p class="text-gray-600 mt-2">{{ $service->description }}</p>
                        <p class="font-bold mt-2">Fee: ₹{{ $service->service_fee }}</p>
                        <a href="{{ url('/service/' . $service->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 transition">Book Now</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
