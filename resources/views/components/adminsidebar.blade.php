<div class="bg-gray-800 text-white w-64 min-h-screen">

    <ul>
        <li><a href="/admin" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i> Dashboard
            </a></li>
        <li><a href="{{ route('admin.manage-service')}}" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Services
            </a></li>
            <li><a href="{{ route('admin.manage-service-on')}}" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> ServiceOn
            </a></li>
            <li><a href="{{ route('admin.manage-requirement')}}" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Requirements
            </a></li>
        <li><a href="{{ route('admin.manage-appointment')}} " class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i> Appointments
            </a></li>
            <li><a href=" {{route('admin.manage-banner')}}" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-users w-5 h-5 mr-3"></i> Banners
            </a></li>
        <li><a href="{{route('admin.manage-user')}}" class=" py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-users w-5 h-5 mr-3"></i> Users
            </a></li>
        <li><a href="{{ route('admin.setting')}}" class="py-3 px-4 hover:bg-gray-700 flex items-center">
                <i class="fas fa-cogs w-5 h-5 mr-3"></i> Settings
            </a></li>
    </ul>
</div>