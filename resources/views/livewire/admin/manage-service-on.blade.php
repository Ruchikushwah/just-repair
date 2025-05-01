<div class="w-full flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 px-4 sm:px-6 lg:px-8 py-6 bg-gray-100">
    <!-- ServiceOn Form -->
    <div class="w-full lg:w-4/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 text-center">Service Information</h2>

        @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg text-sm sm:text-base">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="{{ $isEditing ? 'updateServiceOn' : 'save' }}">
            <div class="flex flex-col gap-4">
                <!-- Service Dropdown -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Service</label>
                    <select wire:model="service_id"
                            class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base transition duration-200">
                        <option value="">Select Service</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                    @error('service_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>

                <!-- Name Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="name"
                           class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base transition duration-200"
                           placeholder="Enter Name">
                    @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit"
                        class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full text-sm sm:text-base">
                    {{ $isEditing ? 'Update ServiceOn' : 'Save ServiceOn' }}
                </button>
            </div>
        </form>
    </div>

    <!-- ServiceOn Table -->
    <div class="w-full lg:w-8/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Manage ServiceOn</h2>

        <!-- Search Bar -->
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search"
                   placeholder="Search Services..."
                   class="w-full rounded-md border border-gray-300 py-2 pl-10 pr-4 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base">
            <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
            </svg>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Id</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Service Name</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Name</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceOns as $index => $serviceOn)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-3 py-3 sm:px-4 sm:py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-3 py-3 sm:px-4 sm:py-4">{{ $serviceOn->service->name }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4">{{ $serviceOn->name }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 flex flex-wrap gap-2">
                            <a href="#" wire:click="editServiceOn({{ $serviceOn->id }})"
                               class="bg-teal-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-teal-700">
                                Edit
                            </a>
                            <a href="#" wire:confirm="Are you sure you want to delete this?"
                               wire:click="deleteServiceOn({{ $serviceOn->id }})"
                               class="bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-red-700">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($serviceOns)
        <div class="mt-4">
            {{ $serviceOns->links() }}
        </div>
        @endif
    </div>
</div>