<div>
    <nav id="navbar" class="fixed top-0 left-0 right-0 mx-auto shadow-sm rounded-full px-10 py-2 flex items-center justify-between w-[90%] max-w-7xl z-10 transition-all duration-300">
        <div class="flex items-center space-x-3">
            <a href="/">
            <img src="/image.jpeg" alt="Logo" class="w-40 h-12 px-1 rounded-full">
            </a>
        </div>
        <div class="flex items-center space-x-4">
            @if(Auth::check())
                <div class="hidden md:flex items-center space-x-2">
                    <img src="{{ Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : asset('/default-avatar.jpg') }}" alt="User Icon" class="w-8 h-8 rounded-full">
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                </div>
            @endif
            <button id="menu-btn" class="bg-[#535C91] text-white px-4 py-2 rounded-xl hover:bg-[#414A78] transition">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </nav>
    <div id="sidebar" class="fixed inset-y-0 left-0 w-68 bg-white shadow-xl transform -translate-x-full transition-transform duration-300 z-40">
        <button id="close-sidebar" class="absolute top-4 right-4 text-gray-600 focus:outline-none">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="px-8 bg-white h-screen overflow-y-auto py-3">
            <h2 class="text-xl font-semibold text-gray-800 mb-8">Hii, {{ Auth::user()->name ?? 'Guest' }}</h2>
            <a href="#" class="flex items-center space-x-3 py-3 text-gray-700 hover:text-blue-500">
                <i class="fas fa-clipboard-list"></i> <span>Our Services</span>
            </a>
            <a href="{{ route('my-booking') }}" class="flex items-center space-x-3 py-3 text-gray-700 hover:text-blue-500">
                <i class="fas fa-calendar-check"></i> <span>My Booking</span>
            </a>
            <a href="#" class="flex items-center space-x-3 py-3 text-gray-700 hover:text-blue-500">
                <i class="fas fa-history"></i> <span>Track your Appointment</span>
            </a>
            <a href="#" class="flex items-center space-x-3 py-3 text-gray-700 hover:text-blue-500">
                <i class="fas fa-info-circle"></i> <span>About Us</span>
            </a>
            <a href="#" class="flex items-center space-x-3 py-3 text-gray-700 hover:text-blue-500 mb-2">
                <i class="fas fa-file-alt"></i> <span>Terms & Conditions</span>
            </a>
            @if (Auth::check())
                <a href="{{ route('auth.logout') }}" class="text-red-400">Logout</a>
            @else
                <a href="{{ route('auth.login') }}" class="text-gray-600 hover:text-blue-500 flex items-center space-x-3 mb-3">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Sign in</span>
                </a>
                <a href="{{ route('auth.register') }}" class="text-gray-600 hover:text-blue-500 flex items-center space-x-3">
                    <i class="fas fa-user-plus"></i>
                    <span>Sign up</span>
                </a>
            @endif
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
                    sidebar.classList.toggle('-translate-x-full');
                });
                closeSidebar.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                });
            }
            // Change navbar background on scroll
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white');
                } else {
                    navbar.classList.remove('bg-white');
                }
            });
        });
    </script>
</div>
