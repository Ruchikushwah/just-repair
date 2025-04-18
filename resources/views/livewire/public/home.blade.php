<style>
body {
    font-family: 'Poppins', sans-serif;
    color: #1a1a1a;
}

.hero {
    /* Fallback gradient background */
    background: linear-gradient(to right, #0f172a, #1e293b, #334155);
    position: relative;
}

.hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.5) 50%, rgba(0, 0, 0, 0.3) 100%);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.booking-form {
    background: white;
    border-radius: 10px;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.booking-form-header {
    background: #535C91;
    color: white;
    padding: 15px 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.service-icon {
    transition: all 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.15);
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

@keyframes shine {
    0% {
        background-position: -100%;
    }

    100% {
        background-position: 200%;
    }
}

.animate-shine {
    background: linear-gradient(90deg,
            #FFD166 0%,
            #FFDB8C 25%,
            #FFD166 50%,
            #FFDB8C 75%,
            #FFD166 100%);
    background-size: 200% auto;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 3s linear infinite;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out forwards;
    opacity: 0;
}

.delay-200 {
    animation-delay: 200ms;
}

.delay-300 {
    animation-delay: 300ms;
}

.delay-400 {
    animation-delay: 400ms;
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

@keyframes ping {

    75%,
    100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

@keyframes ping {

    75%,
    100% {
        transform: scale(2);
        opacity: 0;
    }
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

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out forwards;
    opacity: 0;
}

.delay-400 {
    animation-delay: 400ms;
}

.animate-ping {
    animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
}
</style>

<div class="bg-gray-50">
    <!-- Hero Section with Booking Form -->
    <section class="hero min-h-[750px] flex items-center">
        <div class="container mx-auto px-4 sm:px-[5%] py-16 mt-8 hero-content">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-center justify-between">
                <!-- Left: Hero Text -->
                <div class="lg:w-6/12 text-white space-y-6 animate-fade-in lg:gap-6">
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Expert Repairs For All Your <span class="text-[#FFD166]">Home Appliances</span>
                    </h1>
                    <p class="text-xl text-gray-200 leading-relaxed">
                        Professional and affordable repair services for AC, Refrigerator, Washing Machine, Water
                        Purifier, Geyser and more at your doorstep.
                        <span class="block mt-2 text-base opacity-90">
                            Our expert technicians provide:
                            <span class="block mt-1 ml-1">
                                • AC Service & Repair - Split, Window & Inverter ACs
                            </span>
                            <span class="block mt-1 ml-1">
                                • Refrigerator Repair - Single Door, Double Door & Side-by-Side
                            </span>
                            <span class="block mt-1 ml-1">
                                • Washing Machine Service - Top Load, Front Load & Semi-Automatic
                            </span>
                            <span class="block mt-1 ml-1">
                                • Water Purifier Maintenance - RO, UV & UF Systems
                            </span>
                            <span class="block mt-1 ml-1">
                                • Geyser Installation & Repair - Storage & Instant Geysers
                            </span>
                        </span>
                        <span class="block mt-2 text-sm font-medium text-[#FFD166]">
                            24/7 Emergency Repairs | Genuine Parts | 90-Day Warranty
                        </span>
                    </p>

                    <div class="flex flex-col sm:flex-row gap-6 animate-fade-in-up delay-300">
                        <!-- First Feature Card -->
                        <div
                            class="group relative flex items-center space-x-4 bg-white/10 backdrop-blur-lg rounded-2xl px-6 py-4 hover:bg-white/15 transition-all duration-500 overflow-hidden flex-1">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-[#FFD166]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="bg-gradient-to-br from-[#FFD166] to-[#FFB347] p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-500">
                                    <i class="fas fa-tools text-gray-900 text-lg"></i>
                                </div>
                                <div class="absolute inset-0 bg-[#FFD166]/30 rounded-xl animate-ping opacity-75"></div>
                            </div>
                            <div class="relative z-10">
                                <span
                                    class="font-semibold text-white group-hover:text-[#FFD166] transition-colors duration-300">90-Day
                                    Warranty</span>
                                <p class="text-xs text-white/70 mt-1">Guaranteed repairs & service</p>
                            </div>
                        </div>

                        <!-- Second Feature Card -->
                        <div
                            class="group relative flex items-center space-x-4 bg-white/10 backdrop-blur-lg rounded-2xl px-6 py-4 hover:bg-white/15 transition-all duration-500 overflow-hidden flex-1">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-[#FFD166]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="bg-gradient-to-br from-[#FFD166] to-[#FFB347] p-3 rounded-xl shadow-lg group-hover:scale-110 transition-transform duration-500">
                                    <i class="fas fa-clock text-gray-900 text-lg"></i>
                                </div>
                                <div class="absolute inset-0 bg-[#FFD166]/30 rounded-xl animate-ping opacity-75"></div>
                            </div>
                            <div class="relative z-10">
                                <span
                                    class="font-semibold text-white group-hover:text-[#FFD166] transition-colors duration-300">Same
                                    Day Service</span>
                                <p class="text-xs text-white/70 mt-1">Fast & reliable repairs</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-6 pt-8 animate-fade-in-up delay-400">
                        <a href="#services"
                            class="group relative overflow-hidden bg-gradient-to-r from-[#535C91] via-[#5B649B] to-[#647ACB] text-white px-12 py-4 rounded-2xl font-semibold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl hover:shadow-[#535C91]/25 text-center flex-1">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                            <span class="relative flex items-center justify-center text-lg">
                                <i
                                    class="fas fa-list-ul mr-3 transition-transform duration-300 group-hover:scale-110"></i>
                                Our Services
                            </span>
                            <span
                                class="absolute inset-0 -z-10 bg-gradient-to-r from-[#535C91] to-[#647ACB] blur opacity-0 group-hover:opacity-30 transition-opacity duration-300"></span>
                        </a>

                        <a href="tel:7280080080"
                            class="group relative overflow-hidden border-2 border-white/30 text-white px-12 py-4 rounded-2xl font-semibold transition-all duration-300 flex-1 flex items-center justify-center backdrop-blur-sm hover:border-white/50">
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-white via-white to-white transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></span>
                            <span
                                class="relative z-10 flex items-center justify-center text-lg group-hover:text-[#535C91]">
                                <i
                                    class="fas fa-phone-alt mr-3 transition-all duration-300 group-hover:rotate-12 group-hover:scale-110"></i>
                                Call Now
                            </span>
                            <span class="absolute -right-1 -top-1">
                                <span class="absolute inline-flex h-4 w-4">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#FFD166] opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-[#FFD166]"></span>
                                </span>
                            </span>
                            <span
                                class="absolute inset-0 -z-10 bg-white blur opacity-0 group-hover:opacity-20 transition-opacity duration-300"></span>
                        </a>
                    </div>
                </div>
                <div class="lg:w-5/12 w-full">
                    <div class="booking-form">
                        <div class="booking-form-header">
                            <i class="fas fa-calendar-check text-xl mr-3"></i>
                            <span class="text-xl">Book Repair Service Online</span>
                        </div>
                        <div class="p-6 relative">
                            <livewire:public.appointment-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Services Section -->
    <section id="services" class="py-16 px-4 sm:px-[10%]">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <span class="text-[#535C91] font-medium">Our Expertise</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Home Appliance Repair Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We offer professional repair and maintenance services for all
                    major home appliances with warranty and genuine parts</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-8">
                @foreach($services as $service)
                @if($service->status)
                <div
                    class="group bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition-all duration-300 hover:-translate-y-1 h-full flex flex-col relative border border-gray-100 hover:border-indigo-200">
                    <div class="relative h-40 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity z-10">
                        </div>
                        <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('images/default-service.jpg') }}"
                            alt="{{ $service->name }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow flex flex-col relative bg-white z-20">
                        <div
                            class="absolute -top-4 right-4 bg-indigo-600 text-white text-xs font-medium py-1 px-3 rounded-full shadow-md">
                            Starting at ₹{{ $service->service_fees->min('fees') ?? 499 }}
                        </div>
                        <h3 class="font-semibold text-gray-800 text-lg mb-1">{{ $service->name }}</h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">
                            {{ $service->description ?? 'Professional repair and maintenance service' }}</p>

                        <div class="mt-2 pt-3 border-t border-dashed border-gray-200">
                            <p class="text-xs font-semibold text-gray-700 mb-2">Available Services:</p>
                            <ul class="space-y-1">
                                @foreach($service->service_fees->take(3) as $fee)
                                <li class="flex items-center text-xs text-gray-600">
                                    <span class="text-green-500 mr-1.5">✓</span> {{ $fee->name }} - ₹{{ $fee->fees }}
                                </li>
                                @endforeach
                                @if($service->service_fees->count() > 3)
                                <li class="flex items-center text-xs text-gray-600">
                                    <span class="text-green-500 mr-1.5">✓</span> And more...
                                </li>
                                @endif
                            </ul>
                        </div>

                        <a href="{{ route('service.view', ['id' => $service->id]) }}"
                            class="mt-auto bg-gray-100 text-gray-700 hover:bg-indigo-600 hover:text-white transition-colors duration-300 py-2.5 px-4 rounded-lg text-sm font-medium flex items-center justify-center mt-4">
                            <i class="fas fa-tools mr-2"></i> Book Now
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="#all-services"
                    class="inline-flex items-center text-[#535C91] hover:text-[#414A78] font-medium transition-colors">
                    View All Services <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Why Choose Us Section -->
    <section class="bg-[#F8FAFC] py-16">
        <div class="container mx-auto sm:px-[10%] px-4 sm:px-[10%]">
            <div class="text-center mb-12">
                <span class="text-[#535C91] font-medium">Benefits</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Why Choose Our Repair Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We provide transparent, affordable and professional appliance
                    repair services</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Expert Technicians</h3>
                    <p class="text-gray-600">Our technicians are certified and have years of experience in repairing all
                        types of home appliances.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-green-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">90-Day Warranty</h3>
                    <p class="text-gray-600">All our repair services come with a 90-day warranty on both parts and
                        labor.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-purple-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bolt text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Quick Service</h3>
                    <p class="text-gray-600">Same-day service available for most repairs. We value your time and
                        convenience.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- How We Work Section -->
    <section class="py-16 px-6 bg-white">
        <div class="container mx-auto px-4 sm:px-[10%]">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">How Our Repair Service Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1: Book -->
                <div class="relative">
                    <div
                        class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-[#EEF2FF] rounded-full w-16 h-16 flex items-center justify-center mb-4">
                                <i class="fas fa-calendar-plus text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Book Online</h3>
                            <p class="text-gray-600">Select the appliance and issue you're facing for service</p>
                        </div>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gray-300 z-0"></div>
                </div>
                <!-- Step 2: Diagnosis -->
                <div class="relative">
                    <div
                        class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-[#EEF2FF] rounded-full w-16 h-16 flex items-center justify-center mb-4">
                                <i class="fas fa-search text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Expert Diagnosis</h3>
                            <p class="text-gray-600">Our technician will diagnose the issue with your appliance</p>
                        </div>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gray-300 z-0"></div>
                </div>
                <!-- Step 3: Repair -->
                <div class="relative">
                    <div
                        class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-[#EEF2FF] rounded-full w-16 h-16 flex items-center justify-center mb-4">
                                <i class="fas fa-wrench text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Quick Repair</h3>
                            <p class="text-gray-600">Professional repair with genuine parts and components</p>
                        </div>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-4 w-8 h-0.5 bg-gray-300 z-0"></div>
                </div>
                <!-- Step 4: Happy Customer -->
                <div class="relative">
                    <div
                        class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
                        <div class="flex flex-col items-center text-center">
                            <div class="bg-[#EEF2FF] rounded-full w-16 h-16 flex items-center justify-center mb-4">
                                <i class="fas fa-smile text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Happy Customer</h3>
                            <p class="text-gray-600">Get your appliance working like new with warranty support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section -->
    <div class="max-w-6xl mx-auto px-4 py-12">
        <!-- Header Section -->
        <div class="max-w-2xl mx-auto text-center px-8 mt-12">
            <h3 class="text-sm uppercase tracking-widest text-gray-500 font-semibold">O F F E R S</h3>
            <h2 class="text-3xl font-bold text-gray-900 mt-2">Special Offers</h2>
            <p class="text-gray-600 mt-4 text-lg">
                Check out our latest deals and seasonal discounts tailored for you.
            </p>
        </div>
    
        <!-- Scrolling Offers Section -->
        <div class="mt-10 overflow-x-auto flex space-x-6 pb-4 snap-x snap-mandatory">
            @forelse ($banners as $banner)
                <div class="bg-white overflow-hidden w-72 flex-shrink-0 snap-center transform transition duration-300 hover:scale-105 rounded-lg shadow-md hover:shadow-xl">
                    <img 
                        src="{{ asset('storage/' . $banner->image) }}" 
                        alt="{{ $banner->title }}" 
                        class="w-full h-48 object-cover"
                    >
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold text-gray-900">{{ $banner->title }}</h4>
                        <p class="text-gray-600 mt-2 text-sm line-clamp-2">{{ $banner->description }}</p>
                        <a 
                            href="#" 
                            class="mt-4 inline-block bg-indigo-600 text-white px-5 py-2 rounded-full text-sm font-semibold hover:bg-indigo-700 transition-colors"
                        >
                            Book Now
                        </a>
                    </div>
                </div>
            @empty
                <div class="w-full text-center py-4">
                    <p class="text-gray-600">No offers available at the moment.</p>
                </div>
            @endforelse
        </div>
    
        <style>
            .overflow-x-auto::-webkit-scrollbar {
                display: none;
            }
            
            .overflow-x-auto {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
    </div>
    <!-- Testimonials Section -->
    <section class="bg-[#F8FAFC] py-16">
        <div class="container mx-auto px-8 sm:px-[10%]">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Trusted by thousands of satisfied customers</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Rajesh Kumar</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Excellent service! The technician was very knowledgeable and fixed my AC
                        in no time. Will definitely use again."</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Priya Sharma</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"My refrigerator stopped working suddenly. Booked a service and got it
                        fixed the same day. Great job!"</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Customer"
                            class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Amit Patel</h4>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Professional service at a reasonable price. The technician explained the
                        issue clearly and fixed my washing machine. Highly recommended!"</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Booking Success Modal -->
    @if($showSuccessModal)
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-2xl overflow-hidden animate-fade-in">
            <div class="bg-[#535C91] px-6 py-8 text-white text-center">
                <div class="mb-4 success-animation">
                    <div class="checkmark-circle">
                        <div class="checkmark-stem"></div>
                        <div class="checkmark-kick"></div>
                    </div>
                </div>
                <h1 class="text-2xl font-bold mb-2">Booking Successful!</h1>
                <p class="text-lg">Your repair service has been booked</p>
            </div>

            <div class="p-6">
                <div class="bg-gray-50 p-4 rounded-lg mb-6 text-center">
                    <p class="text-sm text-gray-600 mb-1">Your Job Number</p>
                    <h3 class="text-2xl font-mono font-bold text-[#535C91]">{{ $jobId }}</h3>
                    <p class="text-xs text-gray-500 mt-1">(Save this for future reference)</p>
                </div>

                <div class="space-y-4 mb-6">
                    <div class="flex items-center">
                        <div class="bg-[#EEF2FF] p-2 rounded-full">
                            <i class="fas fa-calendar-check text-[#535C91]"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-700">Appointment Date</p>
                            <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($date)->format('d M, Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-[#EEF2FF] p-2 rounded-full">
                            <i class="fas fa-clock text-[#535C91]"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-700">Appointment Time</p>
                            <p class="text-sm text-gray-600">
                                @if($time == 'morning')
                                Morning (9AM - 12PM)
                                @elseif($time == 'afternoon')
                                Afternoon (12PM - 3PM)
                                @else
                                Evening (3PM - 6PM)
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="bg-[#EEF2FF] p-2 rounded-full">
                            <i class="fas fa-tools text-[#535C91]"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-700">Service</p>
                            <p class="text-sm text-gray-600">
                                {{ $services->firstWhere('id', $selectedService)?->name }} -
                                {{ $serviceOns->firstWhere('id', $selectedServiceOn)?->name }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="border-t pt-6 flex flex-col sm:flex-row justify-between gap-3">
                    <button wire:click="closeSuccessModal"
                        class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition text-center">
                        <i class="fas fa-home mr-2"></i> Continue Browsing
                    </button>
                    <a href="{{ route('my-booking') }}"
                        class="px-6 py-2 bg-[#535C91] text-white rounded-lg font-medium hover:bg-[#414A78] transition text-center">
                        <i class="fas fa-clipboard-list mr-2"></i> Track My Booking
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Custom CSS for Automatic Scrolling and Success Animation -->
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
    }

    .animate-scroll:hover {
        animation-play-state: paused;
    }

    /* Success Animation */
    .success-animation {
        margin: 0 auto;
        width: 80px;
        height: 80px;
        position: relative;
    }

    .checkmark-circle {
        width: 80px;
        height: 80px;
        position: relative;
        display: inline-block;
        vertical-align: top;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .checkmark-circle::before {
        content: '';
        position: absolute;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background-color: #535C91;
        top: 7.5px;
        left: 7.5px;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .checkmark-stem {
        position: absolute;
        width: 5px;
        height: 30px;
        background-color: white;
        left: 38px;
        top: 21px;
        border-radius: 5px;
        transform: rotate(45deg);
        animation: animateSuccessLong 0.75s ease both;
    }

    .checkmark-kick {
        position: absolute;
        width: 17px;
        height: 5px;
        background-color: white;
        left: 24px;
        top: 43px;
        border-radius: 5px;
        transform: rotate(45deg);
        animation: animateSuccessShort 0.75s ease both;
    }

    @keyframes animateSuccessLong {
        0% {
            width: 0;
            right: 46px;
            top: 54px;
        }

        65% {
            width: 0;
            right: 46px;
            top: 54px;
        }

        84% {
            width: 55px;
            right: 0px;
            top: 35px;
        }

        100% {
            width: 30px;
            right: 0px;
            top: 21px;
        }
    }

    @keyframes animateSuccessShort {
        0% {
            width: 0;
            right: 46px;
            top: 37px;
        }

        65% {
            width: 0;
            right: 46px;
            top: 37px;
        }

        84% {
            width: 17px;
            right: 0px;
            top: 37px;
        }

        100% {
            width: 17px;
            right: 0px;
            top: 43px;
        }
    }
    </style>
</div>