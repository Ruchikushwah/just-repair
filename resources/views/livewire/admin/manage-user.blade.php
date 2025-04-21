<div class="w-full px-4 sm:px-6 lg:px-10 py-8 bg-white rounded-2xl mx-auto">
    <div class="w-full flex justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold text-teal-600">Manage User</h1>
        <a href="admin-dashboard" class="flex items-center text-teal-600 hover:text-teal-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
    </div>
    <div class="mb-6 flex justify-end">
        <select wire:model.change="filter" 
                class="border-gray-300 rounded-lg p-2 text-sm bg-white text-gray-700 focus:border-indigo-500 focus:ring-indigo-500">
            <option value="all">All Users</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="last_week">Last Week</option>
            <option value="last_month">Last Month</option>
        </select>
    </div>

    <div class="hidden lg:block overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Contact</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-b border-gray-200 odd:bg-white even:bg-gray-50">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->contact }}</td>
                    <td class="px-6 py-4">
                        <button wire:click="deleteUser({{ $user->id }})" 
                                wire:confirm="Are you sure you want to delete this user?" 
                                class="bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-red-700">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="lg:hidden space-y-4">
        @foreach($users as $index => $user)
        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
            <div class="grid grid-cols-1 gap-2 text-sm text-gray-600">
                <p><span class="font-medium">ID:</span> {{ $index + 1 }}</p>
                <p><span class="font-medium">Name:</span> {{ $user->name }}</p>
                <p><span class="font-medium">Email:</span> {{ $user->email }}</p>
                <p><span class="font-medium">Contact:</span> {{ $user->contact }}</p>
                <p>
                    <button wire:click="deleteUser({{ $user->id }})" 
                            wire:confirm="Are you sure you want to delete this user?" 
                            class="bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-red-700">
                        Delete
                    </button>
                </p>
            </div>
        </div>
        @endforeach
    </div>

    @if($users->hasPages())
    <div class="mt-6 flex justify-end">
        {{ $users->links() }}
    </div>
    @endif
</div>