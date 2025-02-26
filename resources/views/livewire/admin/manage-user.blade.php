
<div class=" w-full flex gap-8 bg-white px-10 py-8 rounded-lg  mx-auto">
<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 px-10 py-8">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="p-4">
                <div class="flex items-center">
                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Name
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Contact
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $index => $user)
        dd($user);
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $index + 1 }}
            </th>
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $user->name }}
            </td>
            <td class="px-6 py-4">
                {{ $user->email }}
            </td>
            <td class="px-6 py-4 flex gap-3">
                <a wire:click="editUser({{ $user->id }})" class="font-medium bg-teal-600 text-white px-4 py-1 rounded-md">Edit</a>
                <button wire:confirm wire:click="deleteUser({{ $user->id }})"
                    class="font-medium bg-red-600 text-white px-2 py-1 rounded-md">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if($users->hasPages())
<div class="mt-3">
    {{ $users->links() }} <!-- Pagination links -->
</div>
@endif
</div>
