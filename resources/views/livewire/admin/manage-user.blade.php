<div class="w-full bg-white px-10 py-8 rounded-2xl ">
    <div class="mb-4 flex justify-end">
        <select wire:model.change="filter" class="border-gray-300 rounded-lg p-2">
            <option value="all">All Users</option>
            <option value="today">Today</option>
            <option value="yesterday">Yesterday</option>
            <option value="last_week">Last Week</option>
            <option value="last_month">Last Month</option>
        </select>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
            <thead class="text-xs uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                <tr>

                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Contact</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">

                    <td class="px-6 py-4 text-black">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 text-black ">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-black">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-black">{{ $user->contact }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($users->hasPages())
    <div class="mt-6 flex justify-end">
        {{ $users->links() }}
    </div>
    @endif
</div>