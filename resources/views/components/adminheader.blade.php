<header class="bg-gray-800 text-white flex items-center justify-between p-4 sticky top-0 z-30">
    
    <div class="flex items-center space-x-4">
       
        <button id="menu-button" class="text-gray-300 hover:text-white lg:hidden focus:outline-none">
            <i class="fas fa-bars w-6 h-6"></i>
        </button>
    
        <h1 class="text-lg sm:text-xl font-bold">Admin Panel</h1>
    </div>

   
    <div class="flex items-center space-x-3 sm:space-x-4">
    
        <div class="flex items-center space-x-2">
            <button class="text-gray-300 hover:text-white flex items-center space-x-1 sm:space-x-2">
                <i class="fas fa-user-circle w-5 h-5 sm:w-6 sm:h-6 mt-3"></i>
                <span class="text-sm sm:text-base">{{ Auth::user()->name }}</span>
            </button>
            <a href="{{ route('auth.logout') }}"
               class="text-sm text-gray-300 hover:text-red-500 px-2 py-1 rounded-lg">
                Logout
            </a>
        </div>
    </div>
</header>