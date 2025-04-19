<div>
    <!-- Main Navigation -->
    <nav id="navbar"
        class="fixed top-0 left-0 right-0 mx-auto shadow-md rounded-xl px-6 py-3 flex items-center justify-between w-[95%] max-w-7xl z-20 transition-all duration-300 bg-white/95 backdrop-blur-sm">
        <div class="flex items-center">
            <a href="/" class="flex items-center">
                <img src="/image.jpeg" alt="Just Repair Logo" class="w-36 h-10 object-contain">
            </a>
        </div>

        <div class="hidden md:flex items-center space-x-6">
            <a href="/" class="text-gray-700 hover:text-[#535C91] font-medium transition-colors">Home</a>
            <div class="relative group">
                <button class="text-gray-700 hover:text-[#535C91] font-medium flex items-center transition-colors">
                    Services <i class="fas fa-chevron-down ml-1 text-xs"></i>
                </button>
                <div class="absolute left-0 mt-2 w-64 bg-white shadow-lg rounded-lg py-2 z-20 hidden group-hover:block">
                    <a wire:navigate href="{{ route('public-services', ['type' => 'ac-repair']) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#EEF2FF] hover:text-[#535C91]">
                        <i class="fas fa-snowflake mr-2"></i> AC Repair & Service
                    </a>
                    <a wire:navigate href="{{ route('public-services', ['type' => 'refrigerator-repair']) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#EEF2FF] hover:text-[#535C91]">
                        <i class="fas fa-temperature-low mr-2"></i> Refrigerator Repair
                    </a>
                    <a wire:navigate href="{{ route('public-services', ['type' => 'water-purifier']) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#EEF2FF] hover:text-[#535C91]">
                        <i class="fas fa-tint mr-2"></i> Water Purifier Service
                    </a>
                    <a wire:navigate href="{{ route('public-services', ['type' => 'washing-machine']) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#EEF2FF] hover:text-[#535C91]">
                        <i class="fas fa-tshirt mr-2"></i> Washing Machine Repair
                    </a>
                    <a wire:navigate href="{{ route('public-services', ['type' => 'geyser-repair']) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#EEF2FF] hover:text-[#535C91]">
                        <i class="fas fa-hot-tub mr-2"></i> Geyser Repair
                    </a>
                </div>
            </div>
            <a href="{{ route('my-booking') }}"
                class="text-gray-700 hover:text-[#535C91] font-medium transition-colors">My Bookings</a>
            <a href="#" class="text-gray-700 hover:text-[#535C91] font-medium transition-colors">About Us</a>
            <a href="#" class="text-gray-700 hover:text-[#535C91] font-medium transition-colors">Contact</a>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Phone Number with Icon -->
            <a href="tel:7280080080" class="hidden md:flex items-center text-[#535C91] hover:text-[#414A78]">
                <i class="fas fa-phone-alt mr-2"></i>
                <span class="font-medium">7280080080</span>
            </a>

            @if(Auth::check())
            <div class="hidden md:flex items-center space-x-3 border-l pl-4 border-gray-200">
                <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('/default-avatar.jpg') }}"
                    alt="User Icon" class="w-9 h-9 rounded-full border-2 border-[#EEF2FF]">
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</span>
                    
                    @if(Auth::user()->isAdmin)
                        <a href="{{ route('admin.dashboard') }}" class="text-xs text-blue-600 hover:underline">Admin</a>
                    @else
                        <span class="text-xs text-gray-500">Customer</span>
                    @endif
                </div>
            </div>
        @else
            <a href="{{ route('login') }}"
               class="hidden md:block text-[#535C91] hover:text-[#414A78] font-medium">Login</a>
        @endif
        
            <button id="menu-btn"
                class="bg-[#535C91] text-white p-2.5 rounded-lg hover:bg-[#414A78] transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#535C91]">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Sidebar -->
    <div id="sidebar"
        class="fixed inset-y-0 right-0 w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 overflow-y-auto">
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-xl font-bold text-gray-800">Just Repair</h2>
            <button id="close-sidebar" class="text-gray-500 hover:text-gray-800 focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="p-6">
            @if(Auth::check())
            <div class="flex items-center space-x-3 pb-4 mb-4 border-b border-gray-100">
                <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('/default-avatar.jpg') }}"
                     alt="User Icon" class="w-12 h-12 rounded-full">
                <div>
                    <p class="font-medium text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->isAdmin)
                        <a href="{{ route('admin.dashboard') }}" class="text-xs text-blue-600 hover:underline">Admin</a>
                    @else
                        <span class="text-xs text-gray-500">Customer</span>
                    @endif
                </div>
            </div>
        @endif

            <!-- Quick Actions -->
            <div class="grid grid-cols-2 gap-3 mb-6">
                <a href="tel:7280080080"
                    class="flex flex-col items-center justify-center bg-[#EEF2FF] p-4 rounded-lg hover:bg-[#535C91] hover:text-white transition-colors group">
                    <i class="fas fa-phone-alt text-[#535C91] group-hover:text-white mb-2 text-xl"></i>
                    <span class="text-sm font-medium">Call Us</span>
                </a>
                <a href="https://wa.me/7280080080"
                    class="flex flex-col items-center justify-center bg-[#EEF2FF] p-4 rounded-lg hover:bg-[#25D366] hover:text-white transition-colors group">
                    <i class="fab fa-whatsapp text-[#535C91] group-hover:text-white mb-2 text-xl"></i>
                    <span class="text-sm font-medium">WhatsApp</span>
                </a>
                <a href="{{ route('my-booking') }}"
                    class="flex flex-col items-center justify-center bg-[#EEF2FF] p-4 rounded-lg hover:bg-[#535C91] hover:text-white transition-colors group">
                    <i class="fas fa-calendar-check text-[#535C91] group-hover:text-white mb-2 text-xl"></i>
                    <span class="text-sm font-medium">My Bookings</span>
                </a>
                <a href="{{route('public-services')}}"
                    class="flex flex-col items-center justify-center bg-[#EEF2FF] p-4 rounded-lg hover:bg-[#535C91] hover:text-white transition-colors group">
                    <i class="fas fa-history text-[#535C91] group-hover:text-white mb-2 text-xl"></i>
                    <span class="text-sm font-medium">Track Status</span>
                </a>
            </div>

            <!-- Main Menu -->
            <div class="space-y-6">
                <div>
                    <h3 class="uppercase text-xs font-semibold text-gray-500 tracking-wider mb-3">Navigation</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="/" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-home mr-3 w-5 text-center"></i> Home
                            </a>
                        </li>
                        <li>
                            <a href="#about" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-info-circle mr-3 w-5 text-center"></i> About Us
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-envelope mr-3 w-5 text-center"></i> Contact Support
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="uppercase text-xs font-semibold text-gray-500 tracking-wider mb-3">Services</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-snowflake mr-3 w-5 text-center"></i> AC Repair & Service
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-temperature-low mr-3 w-5 text-center"></i> Refrigerator Repair
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-tint mr-3 w-5 text-center"></i> Water Purifier Service
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-tshirt mr-3 w-5 text-center"></i> Washing Machine Repair
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#535C91] py-2">
                                <i class="fas fa-hot-tub mr-3 w-5 text-center"></i> Geyser Repair
                            </a>
                        </li>
                    </ul>
                </div>

                @if (Auth::check())
                    <div class="pt-4 border-t border-gray-100">
                        <a href="{{ route('auth.logout') }}" class="flex items-center text-red-500 hover:text-red-600 py-2">
                            <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i> Logout
                        </a>
                    </div>
                @else
                    <div class="pt-4 border-t border-gray-100 space-y-3">
                        <a href="{{ route('login') }}"
                            class="block w-full bg-[#535C91] text-white text-center py-3 rounded-lg hover:bg-[#414A78] transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('auth.register') }}"
                            class="block w-full bg-white border border-[#535C91] text-[#535C91] text-center py-3 rounded-lg hover:bg-[#EEF2FF] transition-colors">
                            Create Account
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Script for Sidebar Toggle and Navbar Scroll -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.getElementById('menu-btn');
            const sidebar = document.getElementById('sidebar');
            const closeSidebar = document.getElementById('close-sidebar');
            const navbar = document.getElementById('navbar');

            // Ensure elements exist before adding listeners
            if (menuBtn && sidebar && closeSidebar) {
                // Open/Close Sidebar
                menuBtn.addEventListener('click', () => {
                    sidebar.classList.toggle('translate-x-full');
                });
                closeSidebar.addEventListener('click', () => {
                    sidebar.classList.add('translate-x-full');
                });

                // Close sidebar when clicking outside
                document.addEventListener('click', (e) => {
                    if (!sidebar.contains(e.target) && e.target !== menuBtn && !sidebar.classList.contains('translate-x-full')) {
                        sidebar.classList.add('translate-x-full');
                    }
                });
            }

            // Change navbar on scroll
            window.addEventListener('scroll', () => {
                if (window.scrollY > 20) {
                    navbar.classList.add('shadow-lg');
                    navbar.classList.remove('mt-4');
                } else {
                    navbar.classList.remove('shadow-lg');
                    navbar.classList.add('mt-4');
                }
            });

            // Initial navbar state
            if (window.scrollY <= 20) {
                navbar.classList.add('mt-4');
            }
        });
    </script>
</div>