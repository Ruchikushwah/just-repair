<div class=" w-full flex gap-8 bg-white px-10 py-8 rounded-lg  mx-auto">
    <div class="w-4/12 h-[500px] px-6 py-8 border-teal-600 border rounded-lg bg-white">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Requirement Form</h2>

        @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg">
            {{ session('message') }}
        </div>
        @endif

        <div class="grid gap-6">
            <!-- Service Dropdown -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Select Service</label>
                <select wire:model.change="service_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-sm py-2 px-4 focus:border-teal-500 focus:ring-teal-500 sm:text-sm transition duration-200">
                    <option value="">Select Service</option>
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
                @error('service_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Select Service On</label>
                <select wire:model="service_on_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-sm py-2 px-4 focus:border-teal-500 focus:ring-teal-500 sm:text-sm transition duration-200">
                    <option value="">Select Service On</option>
                    @foreach ($service_ons as $service_on)
                    <option value="{{ $service_on->id }}">{{ $service_on->name }}</option>
                    @endforeach
                </select>
                @error('service_on_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            <!-- Requirement Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Requirement</label>
                <textarea wire:model="requirement"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-sm py-2 px-4 focus:border-teal-500 focus:ring-teal-500 sm:text-sm transition duration-200"
                    placeholder="Enter Requirement" rows="3"></textarea>
                @error('requirement') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" wire:click="save" wire:loading.attr="disabled"
                class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full">
                <span wire:loading.remove>Submit</span>
                <span wire:loading>Submitting...</span>
            </button>
        </div>
    </div>
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
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Service name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Requirement
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($requirements as $index=> $req)
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
                        {{ $req->serviceOn->name}}

                    </td>
                    <td class="px-6 py-4">
                        {{ $req->requirement}}
                    </td>
                    <td class="px-6 py-4 gap-2 flex">
                        <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                        <a href="#" wire:confirm wire:click="deleteRequirement({{ $req }})" class="font-medium text-red-600  hover:underline">delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($requirements)
        <div class="mt-3">
            {{ $requirements->links()}}
        </div>
        @endif

    </div>
</div>