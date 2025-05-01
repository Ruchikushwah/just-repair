<div class="w-full flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 px-4 sm:px-6 lg:px-8 py-6 bg-gray-100">
    <!-- Requirement Form -->
    <div class="w-full lg:w-4/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 text-center">
            {{ $editingRequirementId ? 'Edit Requirement' : 'Requirement Form' }}
        </h2>

        @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg text-sm sm:text-base">
            {{ session('message') }}
        </div>
        @endif

        <div class="flex flex-col gap-4">
            <!-- Service Dropdown -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Select Service</label>
                <select wire:model.change="service_id"
                        class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base transition duration-200">
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
                        class="mt-1 block w-full rounded-md border border-gray-300 py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base transition duration-200">
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
                <label for="requirement" class="block text-sm font-medium text-gray-700">Requirements</label>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 mt-2">
                    <input wire:model="requirement" type="text" id="requirement"
                           class="w-full rounded-md border border-gray-300 py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base"
                           placeholder="Enter requirement">
                    <button type="button" wire:click="addRequirement"
                            class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition text-sm sm:text-base whitespace-nowrap">
                        Add
                    </button>
                </div>
                @error('requirement') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

                <div class="mt-4 space-y-2">
                    @foreach($requirementInputs as $index => $item)
                    <div class="flex items-center space-x-2">
                        <input type="text" value="{{ $item }}"
                               class="w-full rounded-md border border-gray-300 py-1 px-2 text-sm sm:text-base bg-gray-50" readonly>
                        <button type="button" wire:click="removeRequirement({{ $index }})"
                                class="bg-red-600 text-white px-2 py-1 rounded-md hover:bg-red-700 transition">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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

            <!-- Submit/Update Button -->
            <div class="mt-6">
                @if($editingRequirementId)
                <button type="button" wire:click="updateRequirement" wire:target="updateRequirement" wire:loading.attr="disabled"
                        class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full text-sm sm:text-base">
                    <span wire:loading.remove wire:target="updateRequirement">Update</span>
                    <span wire:loading wire:target="updateRequirement">Updating...</span>
                </button>
                @else
                <button type="button" wire:click="save" wire:target="save" wire:loading.attr="disabled"
                        class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full text-sm sm:text-base">
                    <span wire:loading.remove wire:target="save">Submit</span>
                    <span wire:loading wire:target="save">Submitting...</span>
                </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Requirement Table -->
    <div class="w-full lg:w-8/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Manage Requirements</h2>

        <!-- Search Bar -->
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search"
                   placeholder="Search Requirements..."
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
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3 hidden sm:table-cell">Service On</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3 hidden sm:table-cell">Requirement</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requirements as $index => $req)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-3 py-3 sm:px-4 sm:py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-3 py-3 sm:px-4 sm:py-4">{{ $req->service->name ?? 'N/A' }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 hidden sm:table-cell max-w-xs truncate">{{ $req->serviceOn->name ?? 'N/A' }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 hidden sm:table-cell max-w-xs truncate">{{ $req->requirement }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 flex flex-wrap gap-2">
                            <a href="#" wire:click="editRequirement({{ $req->id }})"
                               class="bg-teal-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-teal-700">
                                Edit
                            </a>
                            <a href="#" wire:confirm="Are you sure you want to delete this?"
                               wire:click="deleteReq({{ $req->id }})"
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
        @if($requirements->count())
        <div class="mt-4">
            {{ $requirements->links() }}
        </div>
        @endif
    </div>
</div>