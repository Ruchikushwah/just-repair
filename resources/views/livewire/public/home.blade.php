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
        background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.5) 50%, rgba(0,0,0,0.3) 100%);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .booking-form {
        background: white;
        border-radius: 10px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
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

    .service-card {
        transition: all 0.3s ease;
        border-bottom: 3px solid transparent;
    }
    
    .service-card:hover {
        transform: translateY(-5px);
        border-bottom-color: #535C91;
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    
    .appliance-tag {
        position: absolute;
        top: -10px;
        right: 20px;
        background: #FF6B6B;
        color: white;
        padding: 4px 12px;
        border-radius: 15px;
        font-weight: 500;
        font-size: 12px;
    }
</style>

<div class="bg-gray-50">
    <!-- Hero Section with Booking Form -->
    <section class="hero min-h-[750px] flex items-center">
        <div class="container mx-auto px-4 sm:px-8 py-16 mt-10 hero-content">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 items-center">
                <!-- Left: Hero Text -->
                <div class="lg:w-1/2 text-white space-y-6 animate-fade-in">
                    <div class="inline-block bg-[#FF6B6B] px-4 py-1 rounded-full text-sm font-medium mb-2">24/7 Home Appliance Repairs</div>
                    <h1 class="text-4xl md:text-5xl font-bold leading-tight">
                        Expert Repairs For All Your <span class="text-[#FFD166]">Home Appliances</span>
                    </h1>
                    <p class="text-lg text-gray-200 tracking-wide">
                        Professional and affordable repair services for AC, Refrigerator, Washing Machine, Water Purifier, Geyser and more at your doorstep.
                    </p>
                    
                    <div class="flex items-center space-x-8 pt-4">
                        <div class="flex items-center space-x-2">
                            <div class="bg-white/20 p-2 rounded-full">
                                <i class="fas fa-tools text-[#FFD166]"></i>
                            </div>
                            <span class="text-sm">90-Day Warranty</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-white/20 p-2 rounded-full">
                                <i class="fas fa-clock text-[#FFD166]"></i>
                            </div>
                            <span class="text-sm">Same Day Service</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                        <a href="#services" class="bg-[#535C91] text-white px-8 py-4 rounded-lg font-semibold hover:bg-[#414A78] transition duration-300 text-center">
                            <i class="fas fa-list-ul mr-2"></i> Our Services
                        </a>
                        <a href="tel:7280080080" class="border border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-[#535C91] transition duration-300 flex items-center justify-center">
                            <i class="fas fa-phone-alt mr-2"></i> Call Now
                        </a>
                    </div>
                </div>
                
                <!-- Right: Booking Form -->
                <div class="lg:w-1/2 w-full">
                    <div class="booking-form">
                        <div class="booking-form-header">
                            <i class="fas fa-calendar-check text-xl mr-3"></i>
                            <span class="text-xl">Book Repair Service Online</span>
                        </div>
                        <div class="p-6">
                            <form wire:submit.prevent="bookService" class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                                        <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent" placeholder="Your Name">
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone Number</label>
                                        <input type="tel" id="phone" wire:model="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent" placeholder="10-digit mobile number">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="service" class="block text-gray-700 text-sm font-medium mb-2">Select Appliance</label>
                                    <select id="service" wire:model="service" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                                        <option value="">Select an appliance</option>
                                        <option value="ac">Air Conditioner</option>
                                        <option value="refrigerator">Refrigerator</option>
                                        <option value="washing-machine">Washing Machine</option>
                                        <option value="water-purifier">Water Purifier</option>
                                        <option value="geyser">Geyser</option>
                                        <option value="other">Other Appliance</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="address" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                                    <textarea id="address" wire:model="address" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent" placeholder="Your complete address"></textarea>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="date" class="block text-gray-700 text-sm font-medium mb-2">Preferred Date</label>
                                        <input type="date" id="date" wire:model="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="time" class="block text-gray-700 text-sm font-medium mb-2">Preferred Time</label>
                                        <select id="time" wire:model="time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent">
                                            <option value="">Select time slot</option>
                                            <option value="morning">Morning (9AM - 12PM)</option>
                                            <option value="afternoon">Afternoon (12PM - 3PM)</option>
                                            <option value="evening">Evening (3PM - 6PM)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="issue" class="block text-gray-700 text-sm font-medium mb-2">Issue Description (Optional)</label>
                                    <textarea id="issue" wire:model="issue" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#535C91] focus:border-transparent" placeholder="Briefly describe the issue you're facing"></textarea>
                                </div>
                                
                                <button type="submit" class="w-full bg-[#535C91] text-white py-3 rounded-lg font-semibold hover:bg-[#414A78] transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-tools mr-2"></i> Book Repair Service
                                </button>
                                
                                <p class="text-xs text-gray-500 text-center">By booking, you agree to our terms and services</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Services Section -->
    <section id="services" class="py-16 px-4">
        <div class="container mx-auto">
            <div class="text-center mb-12">
                <span class="text-[#535C91] font-medium">Our Expertise</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Home Appliance Repair Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We offer professional repair and maintenance services for all major home appliances with warranty and genuine parts</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mt-8">
                <!-- AC Repair -->
                <div class="relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="appliance-tag">Most Popular</div>
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="bg-[#EEF2FF] p-4 rounded-full mb-4 service-icon">
                                <i class="fas fa-snowflake text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 text-center">AC Repair</h3>
                            <p class="text-gray-500 text-center text-sm mt-2">Cooling, service & installation</p>
                            <p class="text-[#535C91] font-medium text-center mt-3">Starting at ₹499</p>
                            <a href="#" class="mt-4 w-full bg-gray-100 hover:bg-[#535C91] hover:text-white text-gray-800 font-medium py-2 px-4 rounded-lg transition-all text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Refrigerator Repair -->
                <div class="relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="bg-[#EEF2FF] p-4 rounded-full mb-4 service-icon">
                                <i class="fas fa-temperature-low text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 text-center">Refrigerator Repair</h3>
                            <p class="text-gray-500 text-center text-sm mt-2">All types & brands</p>
                            <p class="text-[#535C91] font-medium text-center mt-3">Starting at ₹599</p>
                            <a href="#" class="mt-4 w-full bg-gray-100 hover:bg-[#535C91] hover:text-white text-gray-800 font-medium py-2 px-4 rounded-lg transition-all text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Washing Machine Repair -->
                <div class="relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="bg-[#EEF2FF] p-4 rounded-full mb-4 service-icon">
                                <i class="fas fa-washer text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 text-center">Washing Machine</h3>
                            <p class="text-gray-500 text-center text-sm mt-2">Front & top load repairs</p>
                            <p class="text-[#535C91] font-medium text-center mt-3">Starting at ₹549</p>
                            <a href="#" class="mt-4 w-full bg-gray-100 hover:bg-[#535C91] hover:text-white text-gray-800 font-medium py-2 px-4 rounded-lg transition-all text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Water Purifier Repair -->
                <div class="relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="bg-[#EEF2FF] p-4 rounded-full mb-4 service-icon">
                                <i class="fas fa-tint text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 text-center">Water Purifier</h3>
                            <p class="text-gray-500 text-center text-sm mt-2">Service & filter replacement</p>
                            <p class="text-[#535C91] font-medium text-center mt-3">Starting at ₹399</p>
                            <a href="#" class="mt-4 w-full bg-gray-100 hover:bg-[#535C91] hover:text-white text-gray-800 font-medium py-2 px-4 rounded-lg transition-all text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Geyser Repair -->
                <div class="relative overflow-hidden rounded-xl bg-white shadow-md hover:shadow-lg transition-all duration-300">
                    <div class="p-6">
                        <div class="flex flex-col items-center">
                            <div class="bg-[#EEF2FF] p-4 rounded-full mb-4 service-icon">
                                <i class="fas fa-hot-tub text-[#535C91] text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 text-center">Geyser Repair</h3>
                            <p class="text-gray-500 text-center text-sm mt-2">Electric & gas models</p>
                            <p class="text-[#535C91] font-medium text-center mt-3">Starting at ₹499</p>
                            <a href="#" class="mt-4 w-full bg-gray-100 hover:bg-[#535C91] hover:text-white text-gray-800 font-medium py-2 px-4 rounded-lg transition-all text-center">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#all-services" class="inline-flex items-center text-[#535C91] hover:text-[#414A78] font-medium transition-colors">
                    View All Services <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="bg-[#F8FAFC] py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-[#535C91] font-medium">Benefits</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Why Choose Our Repair Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We provide transparent, affordable and professional appliance repair services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-blue-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-user-tie text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Expert Technicians</h3>
                    <p class="text-gray-600">Our technicians are certified and have years of experience in repairing all types of home appliances.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-green-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">90-Day Warranty</h3>
                    <p class="text-gray-600">All our repair services come with a 90-day warranty on both parts and labor.</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="bg-purple-100 w-14 h-14 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-bolt text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Quick Service</h3>
                    <p class="text-gray-600">Same-day service available for most repairs. We value your time and convenience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How We Work Section -->
    <section class="py-16 px-6 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">How Our Repair Service Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1: Book -->
                <div class="relative">
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
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
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
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
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
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
                    <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-300 border-t-4 border-[#535C91] z-10 relative">
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
    <section class="container mx-auto px-8 pb-16">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Special Offers</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Check out our latest deals and seasonal discounts</p>
        </div>
        
        <div class="mt-6 overflow-hidden relative">
            <!-- Scrolling Wrapper -->
            <div class="flex animate-scroll space-x-6">
                @foreach($banners as $banner)
                <div class="relative min-w-[60%] sm:min-w-[40%] md:min-w-[30%] h-60 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <h3 class="text-lg font-semibold">{{ $banner->title }}</h3>
                        <p class="text-sm">{{ $banner->description }}</p>
                        <a href="#" class="mt-2 inline-block bg-white text-[#535C91] px-4 py-1 rounded-full text-sm font-medium">Book Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-[#F8FAFC] py-16">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Trusted by thousands of satisfied customers</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
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
                    <p class="text-gray-600">"Excellent service! The technician was very knowledgeable and fixed my AC in no time. Will definitely use again."</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
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
                    <p class="text-gray-600">"My refrigerator stopped working suddenly. Booked a service and got it fixed the same day. Great job!"</p>
                </div>
                
                <div class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
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
                    <p class="text-gray-600">"Professional service at a reasonable price. The technician explained the issue clearly and fixed my washing machine. Highly recommended!"</p>
                </div>
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
        }

        .animate-scroll:hover {
            animation-play-state: paused;
        }
    </style>
</div>