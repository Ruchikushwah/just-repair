<div class="w-full  flex gap-8 px-4 py-6">
    <form wire:submit.prevent="{{ $isEditing ? 'updateService' : 'saveService' }}" class="w-4/12 h-[600px]  px-6 py-8  border-teal-600 border  rounded-lg bg-white">

        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center"> Create Service</h2>

        <!-- Service Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
            <input type="text" id="name"
                wire:model="name"
                class="mt-1 block w-full rounded-md border-gray-300 border bg-white py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter Service Name">
            @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Service Image:</label>
            <input type="file" id="image" wire:model="image"
                class="mt-1 block w-full rounded-md border-gray-300 border bg-white py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" class="h-16 w-16 rounded-full shadow-md" alt="Service Icon Preview">
            </div>
            @elseif ($existingImage) <!-- Add this condition for the update case -->
            <div class="mt-2">
                <img src="{{ asset('/image/'.$existingImage) }}" class="h-16 w-16 rounded-full shadow-md" alt="Existing Service Icon">
            </div>
            @endif
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" wire:model="description"
                rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 border bg-white py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                placeholder="Enter service description"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-teal-600 text-white  px-4 py-2 rounded-md hover:bg-teal-700 transition w-full mb-4">
            {{ $isEditing ? 'Update Service' : 'Create Service' }}
        </button>

        @if($isEditing)
        <button type="button" wire:click="resetFields" class="bg-gray-500 text-slate-100 hover:bg-gray-00 px-4 py-2 rounded  w-full">Cancel</button>
        @endif
    </form>
    </form>

    <div class="w-8/12 overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Service name
                    </th>
                    <!-- <th scope="col" class="px-6 py-3">
                        image
                    </th> -->
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
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

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $service->name }}
                    </th>
                    <!-- <td class="px-6 py-4">
                        {{$service->image}}
                    </td> -->
                    <td class="px-6 py-4">
                        {{$service->description}}
                    </td>

                    <td class="px-6 py-4  flex gap-5">
                        <a wire:click="editService({{ $service->id }})" class="font-medium text-blue-600  hover:underline">Edit</a>
                        <button wire:confirm wire:click="deleteService({{ $service->id }})"
                            class="font-medium text-red-600 hover:underline"
                          >
                            Delete
                        </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($services)
        <div class="mt-3">
            {{ $services->links() }}
        </div>
        @endif

    </div>
</div>