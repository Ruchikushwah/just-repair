<div class="w-full px-4 sm:px-6 lg:px-10 py-8 bg-white rounded-2xl mx-auto">
   
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
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-b border-gray-200 odd:bg-white even:bg-gray-50">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->contact }}</td>
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