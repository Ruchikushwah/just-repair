<div class="bg-gray-800 text-white flex items-center justify-between p-4">
    <!-- Logo Section -->
    <div class="flex items-center">
        <h1 class="text-xl font-bold">Admin Panel</h1>
    </div>

    <!-- Navbar or Controls Section -->
    <div class="flex items-center  justify-center space-x-4">
        <!-- Notifications -->
        <button class="text-gray-300 hover:text-white">
            <i class="fas fa-bell"></i>
        </button>

        <!-- User Menu -->
        <div class="relative ">
            <button class="text-gray-300 hover:text-white flex items-center">
                <i class="fas fa-user-circle w-6 h-6 mr-2 mt-2"></i>
                <span>Admin</span>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white text-black shadow-lg rounded-lg hidden group-hover:block">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                <a href="" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</div>
