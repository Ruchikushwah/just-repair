<nav class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-white shadow-sm rounded-full px-6 py-2 flex items-center justify-between w-[90%] max-w-5xl z-50">
    
    <div class="flex items-center space-x-3">
        <img src="/image.jpeg" alt="Logo" class="w-40 h-12 px-1 rounded-full">
    </div>

   
    <div class="hidden md:flex items-center space-x-6">
        <a href="#" class="text-gray-600 hover:text-blue-500">About</a>
        <a href="#" class="text-gray-600 hover:text-blue-500">Services</a>
        <a href="#" class="text-gray-600 hover:text-blue-500">Pricing</a>
    </div>

   
    <div class="hidden md:flex items-center space-x-4">
        <a href="#" class="text-gray-600 hover:text-blue-500">Sign in</a>
        <button class="bg-[#535C91] text-white px-4 py-2 rounded-full hover:bg-[#414A78] transition">
            Book Appointment
        </button>
    </div>

    <!-- Mobile Menu Button -->
    <button id="menu-btn" class="md:hidden text-gray-600 focus:outline-none">
        <i class="fas fa-bars text-2xl"></i>
    </button>
</nav>
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>