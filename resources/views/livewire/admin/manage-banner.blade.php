<div class="w-full flex gap-8 bg-white px-10 py-8 rounded-lg mx-auto">

    <!-- Banner Upload Form -->
    <div class="w-4/12 h-[380px] px-6 py-8 border-teal-600 border rounded-lg bg-white">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Add Banner</h2>

        @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="{{ $isEditing ? 'updateBanner' : 'save' }}" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Banner Image:</label>
                <input type="file" wire:model="image" class="mt-1 block w-full rounded-md border-gray-400 bg-white py-2 px-4  focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                @error('image') <span class="text-red-600">{{ $message }}</span> @enderror

                @if ($image)
                <img src="{{ $image->temporaryUrl() }}" class="mt-4 w-32 rounded-lg" />
                @endif
            </div>

            <button type="submit" class="bg-teal-600 text-white px-4 py-2 rounded-md w-full hover:bg-teal-700 transition">
                {{ $isEditing ? 'Update Banner' : 'Save Banner' }}
            </button>
        </form>
    </div>


    <div class="w-8/12 overflow-x-auto">
    <h2 class="text-xl font-semibold mb-2">Manage Banners</h2>

    <div class="mb-6 relative">
        <input type="text" wire:model.live.debounce.150ms="search" placeholder="Search Banners..." class="w-full rounded-md border-gray-300 bg-white py-2 pl-10 pr-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
        </svg>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($banners as $index => $banner)
        <div class="bg-white border rounded-lg overflow-hidden max-w-xs w-full">
            <p class="text-gray-800 font-semibold text-center py-2">ID: {{ $index + 1 }}</p>
            <img src="{{ asset('storage/' . $banner->image) }}" class="w-full h-60 object-cover" />
            <div class="p-6">
                <div class="flex justify-between items-center mt-4">
                    <a href="#" wire:click="editBanner({{ $banner->id }})" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">Edit</a>
                    <a href="#" wire:click="deleteBanner({{ $banner->id }})" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($banners->hasPages())
    <div class="mt-3">
        {{ $banners->links() }}
    </div>
    @endif
</div>

</div>