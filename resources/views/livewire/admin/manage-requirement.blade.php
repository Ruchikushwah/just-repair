<div class=" w-full flex gap-8 bg-white px-10 py-8 rounded-lg  mx-auto">
    <div class="w-4/12 h-[500px] px-6 py-8 border-teal-600 border rounded-lg bg-white">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">{{ $editingRequirementId ? 'Edit Requirement' : 'Requirement Form' }}</h2>

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
            @if($service_id)
            <div>
                <label class="block text-sm font-medium text-gray-700">Select Service On</label>
                <select wire:model.change="service_on_id"
                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white shadow-sm py-2 px-4 focus:border-teal-500 focus:ring-teal-500 sm:text-sm transition duration-200">
                    <option value="">Select Service On</option>
                    @foreach ($service_ons as $service_on)
                    <option value="{{ $service_on->id }}">{{ $service_on->name }}</option>
                    @endforeach
                </select>
                @error('service_on_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
            @endif
            <!-- Requirement Input -->
            @if($service_on_id)
            <div>
                <label for="requirement" class="block text-sm font-medium text-gray-700">Requirements:</label>
                <div class="flex space-x-2 mt-2">

                    <input wire:model="requirement" type="text" id="requirement"
                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-indigo-500" placeholder="Enter requirement">


                    <button type="button" wire:click="addRequirement"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                        Add
                    </button>
                </div>

                @error('requirement')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror


                <div class="mt-4 space-y-2">
                    @foreach($requirementInputs as $index => $item)
                    <div class="flex items-center space-x-2">

                        <input type="text" value="{{ $item }}" class="w-full border py-1 p-2 rounded-md focus:outline-none" readonly>


                        <button type="button" wire:click="removeRequirement({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition duration-300">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>

                @if (session()->has('error'))
                <div class="text-red-500 text-sm mt-2">{{ session('error') }}</div>
                @endif
            </div>
            @endif

        </div>
        <div class="mt-6">
            @if($editingRequirementId)
                <button type="button" wire:click="updateRequirement" wire:target="updateRequirement" wire:loading.attr="disabled"
                    class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full">
                    <span wire:loading.remove wire:target="updateRequirement">Update</span>
                    <span wire:loading wire:target="updateRequirement">Updating...</span>
                </button>
            @else
                <button type="submit" wire:click="save" wire:target="save" wire:loading.attr="disabled"
                    class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full">
                    <span wire:loading.remove wire:target="save">Submit</span>
                    <span wire:loading wire:target="save">Submitting...</span>
                </button>
            @endif
        </div>
    </div>
    <div class="w-8/12 overflow-x-auto">
    <h2 class="text-xl font-semibold mb-2"> Manage Requirement </h2>
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search" placeholder="Search Services..." class="w-full rounded-md border-gray-300 border bg-white py-2 pl-10 pr-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
            </svg>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <!-- Checkbox Column -->
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <!-- Other Columns -->
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Service Name</th>
                    <th scope="col" class="px-6 py-3">Service On</th>
                    <th scope="col" class="px-6 py-3">Requirement</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requirements as $index => $req)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <!-- Checkbox -->
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-{{ $req->id }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-{{ $req->id }}" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <!-- Table Content -->
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $index + 1 }}
                    </th>
                    <td class="px-6 py-4">{{ $req->service->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $req->serviceOn->name ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $req->requirement }}</td>

                    <!-- Actions Column -->
                    <td class="px-6 py-4 gap-2 flex">
                        <a href="#" wire:click="editRequirement({{ $req->id }})" class="font-medium  bg-teal-600   text-white px-3 py-1 rounded-md">Edit</a>
                        <a href="#"  wire:confirm ="Are you sure you want to delete this?" wire:click="deleteReq({{ $req->id }})" class="font-medium bg-red-600 text-white px-3 py-1 rounded-md ">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination (if available) -->
        @if($requirements->count())
        <div class="mt-3">
            {{ $requirements->links() }}
        </div>
        @endif
    </div>
</div>