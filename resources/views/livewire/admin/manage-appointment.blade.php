
<div class="w-full px-4 sm:px-6 lg:px-10 py-8 bg-white">
    <h2 class="text-xl font-semibold mb-4 text-gray-900">Manage Appointment</h2>
    
   
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:space-x-4">
        <div class="relative flex-grow mb-4 sm:mb-0">
            <input type="text" wire:model.live.debounce.150ms="search" placeholder="Search Services..." 
                   class="w-full rounded-md border-gray-300 border py-2 pl-10 pr-4 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base">
            <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
            </svg>
        </div>
        <select wire:model.change="filter" class="text-white bg-gray-500 px-3 py-2 rounded-md sm:text-sm">
            <option value="all">All</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="last_week">Last Week</option>
            <option value="last_month">Last Month</option>
            <option value="last_year">Last Year</option>
        </select>
    </div>
    
   
    <div class="hidden lg:block overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Job no</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Contact</th>
                    <th scope="col" class="px-6 py-3">Address</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $index => $appointment)
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->job_no }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->name }}</th>
                    <td class="px-6 py-4">{{ $appointment->pref_date }}</td>
                    <td class="px-6 py-4">{{ $appointment->contact_no }}</td>
                    <td class="px-6 py-4">{{ $appointment->address }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md">{{ $appointment->status }}</span>
                    </td>
                    <td class="px-6 py-4 flex gap-3">
                        <a href="#" wire:click="viewAppointment({{ $appointment->id }})" class="font-medium bg-orange-500 text-white px-4 py-1 rounded-md hover:bg-orange-600">View</a>
                        <a href="#" wire:confirm="Are you sure you want to delete this?" wire:click="deleteAppointment({{ $appointment->id }})" class="font-medium bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Card Layout for Mobile -->
    <div class="lg:hidden space-y-4">
        @foreach($appointments as $index => $appointment)
        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-900">ID: {{ $index + 1 }}</span>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-md text-xs">{{ $appointment->status }}</span>
            </div>
            <div class="grid grid-cols-1 gap-2 text-sm text-gray-600">
                <p><span class="font-medium">Job No:</span> {{ $appointment->job_no }}</p>
                <p><span class="font-medium">Name:</span> {{ $appointment->name }}</p>
                <p><span class="font-medium">Date:</span> {{ $appointment->pref_date }}</p>
                <p><span class="font-medium">Contact:</span> {{ $appointment->contact_no }}</p>
                <p><span class="font-medium">Address:</span> {{ $appointment->address }}</p>
            </div>
            <div class="flex gap-3 mt-4">
                <a href="#" wire:click="viewAppointment({{ $appointment->id }})" class="flex-1 text-center bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">View</a>
                <a href="#" wire:confirm="Are you sure you want to delete this?" wire:click="deleteAppointment({{ $appointment->id }})" class="flex-1 text-center bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>