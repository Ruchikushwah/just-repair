<aside id="sidebar"
       class="bg-gray-800 text-white w-64 min-h-screen flex-shrink-0 fixed inset-y-0 left-0 z-20 lg:static lg:translate-x-0 transform -translate-x-full transition-transform duration-300 ease-in-out">
    <div class="flex items-center justify-between p-4 lg:hidden">
        <h2 class="text-lg font-bold">Menu</h2>
        <button id="close-sidebar" class="text-gray-300 hover:text-white">
            <i class="fas fa-times w-6 h-6"></i>
        </button>
    </div>
    <ul class="mt-4 lg:mt-0">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-service') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Services
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-service-on') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> ServiceOn
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-requirement') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Requirements
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-appointment') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i> Appointments
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-banner') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-users w-5 h-5 mr-3"></i> Banners
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-user') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-users w-5 h-5 mr-3"></i> Users
            </a>
        </li>
        <li>
            <a href="{{ route('admin.setting') }}"
               class="py-3 px-4 hover:bg-gray-700 flex items-center text-sm sm:text-base">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Settings
            </a>
        </li>
    </ul>
</aside>