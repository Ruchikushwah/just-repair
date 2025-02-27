<div class="bg-gray-800 text-white flex items-center justify-between p-4">
    <!-- Logo Section -->
    <div class="flex items-center">
        <h1 class="text-xl font-bold">Admin Panel</h1>
    </div>


    <div class="flex items-center  justify-center space-x-4">

        <button class="text-gray-300 hover:text-white">
            <i class="fas fa-bell"></i>
        </button>


        <div class="relative flex gap-2">
            <button class="text-gray-300 hover:text-white flex items-center ">
                <i class="fas fa-user-circle w-6 h-6 mr-2 mt-2"></i>
                <span>{{ Auth::user()->name }}</span>
               
            </button>
            <a href="{{route('auth.logout')}}" class="block px-3 py-1 hover:bg-red-100 hover:text-slate-700 rounded-lg">Logout</a>

          
        </div>
    </div>
</div>