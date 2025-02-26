<div class=" w-full flex gap-8 bg-white px-10 py-8 rounded-lg  mx-auto">
    <div class="w-4/12 h-[380px] px-6 py-8 border-teal-600 border rounded-lg bg-white">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Service Information</h2>

        @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="{{ $isEditing ? 'updateServiceOn' : 'save' }}">
            <div class="flex flex-col sm:grid-cols-2 gap-6">
                <!-- Service Dropdown -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Service</label>
                    <select wire:model="service_id"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white  py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-200">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Name Input -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition duration-200"
                        placeholder="Enter Name">
                    @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                    class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full">
                    {{ $isEditing ? 'Update ServiceOn' : 'Save ServiceOn' }}
                </button>
            </div>
        </form>
    </div>

    <div class="w-8/12 overflow-x-auto">
        <h2 class="text-xl font-semibold mb-2">Manage ServiceOn </h2>
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search" placeholder="Search Services..." class="w-full rounded-md border-gray-300 border bg-white py-2 pl-10 pr-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
            </svg>
        </div>
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
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Service name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($serviceOns as $index => $serviceOn)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index + 1}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $serviceOn->service->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $serviceOn->name}}
                    </td>
                    <td class="px-6 py-4 gap-2 flex">
                        <a href="#" wire:click="editServiceOn({{ $serviceOn->id }})" class="font-medium   hover:underline  bg-teal-600   text-white px-4 py-1 rounded-md">Edit</a>
                        <a href="#" wire:click="deleteServiceOn({{$serviceOn }})" class="font-medium bg-red-600 text-white px-4 py-1 rounded-md hover:underline">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($serviceOns)
        <div class="mt-3">
            {{ $serviceOns->links() }}
        </div>

        @endif
    </div>

</div>