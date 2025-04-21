<div class="w-full flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 px-4 sm:px-6 lg:px-8 py-6 bg-gray-100">
    <!-- Service Form -->
    <form wire:submit.prevent="{{ $isEditing ? 'updateService' : 'saveService' }}"
          class="w-full lg:w-4/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4 text-center">
            {{ $isEditing ? 'Update Service' : 'Create Service' }}
        </h2>

        <!-- Service Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
            <input type="text" id="name" wire:model="name"
                   class="mt-1 block w-full rounded-md border-gray-300 border py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base"
                   placeholder="Enter Service Name">
            @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Service Image -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Service Image</label>
            <input type="file" id="image" wire:model="image"
                   class="mt-1 block w-full rounded-md border-gray-300 border py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base">
            @error('image') <span class="text-sm text-red-500">{{ $message }}</span> @enderror

            @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" class="h-12 w-12 sm:h-14 sm:w-14 rounded-full shadow-md object-cover" alt="Service Icon Preview">
            </div>
            @elseif ($existingImage)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $existingImage) }}" class="h-12 w-12 sm:h-14 sm:w-14 rounded-full shadow-md object-cover" alt="Existing Service Icon">
            </div>
            @endif
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description" rows="5"
                      class="mt-1 block w-full rounded-md border-gray-300 border py-2 px-3 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base"
                      placeholder="Enter service description"></textarea>
            @error('description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
                class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition w-full text-sm sm:text-base">
            {{ $isEditing ? 'Update Service' : 'Create Service' }}
        </button>

        <!-- Cancel Button (for Edit Mode) -->
        @if($isEditing)
        <button type="button" wire:click="resetFields"
                class="mt-3 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition w-full text-sm sm:text-base">
            Cancel
        </button>
        @endif
    </form>

    <!-- Service Table -->
    <div class="w-full lg:w-8/12 bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Manage Services</h2>

        <!-- Search Bar -->
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search"
                   placeholder="Search Services..."
                   class="w-full rounded-md border-gray-300 border py-2 pl-10 pr-4 focus:border-teal-500 focus:ring-teal-500 text-sm sm:text-base">
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
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3 hidden sm:table-cell">Description</th>
                        <th scope="col" class="px-3 py-2 sm:px-4 sm:py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $index => $service)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-3 py-3 sm:px-4 sm:py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-3 py-3 sm:px-4 sm:py-4">{{ $service->name }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 max-w-xs truncate hidden sm:table-cell">{{ $service->description }}</td>
                        <td class="px-3 py-3 sm:px-4 sm:py-4 flex flex-wrap gap-2">
                            <a href="#" wire:click="viewService({{ $service->id }})"
                               class="bg-yellow-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-yellow-700">
                                View
                            </a>
                            <a wire:click="editService({{ $service->id }})"
                               class="bg-teal-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-teal-700">
                                Edit
                            </a>
                            <button wire:confirm="Are you sure you want to delete this service?"
                                    wire:click="deleteService({{ $service->id }})"
                                    class="bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-md text-xs sm:text-sm hover:bg-red-700">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($services)
        <div class="mt-4">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</div>