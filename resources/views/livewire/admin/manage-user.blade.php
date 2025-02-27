<div class="w-full bg-white px-10 py-8 rounded-2xl shadow-lg">
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
                    
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->contact }}</td>
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