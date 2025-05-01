<div class="w-full px-4 sm:px-6 lg:px-10 py-8 bg-white mx-auto">
   
    <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
     
        <div class="w-full lg:w-4/12 bg-white border border-teal-600 rounded-lg px-6 py-8 mt-6 lg:mt-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Add Banner</h2>

            @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded-lg text-sm">
                {{ session('message') }}
            </div>
            @endif

            <form wire:submit.prevent="{{ $isEditing ? 'updateBanner' : 'save' }}" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Banner Image:</label>
                    <input type="file" wire:model="image" 
                           class="mt-1 block w-full rounded-md border-gray-400 bg-white py-2 px-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                    @error('image') 
                    <span class="text-red-600 text-sm">{{ $message }}</span> 
                    @enderror

                    @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-4 w-32 rounded-lg object-cover" />
                    @endif
                </div>

                <button type="submit" 
                        class="bg-teal-600 text-white px-4 py-2 rounded-md w-full hover:bg-teal-700 transition text-sm">
                    {{ $isEditing ? 'Update Banner' : 'Save Banner' }}
                </button>
            </form>
        </div>

   
        <div class="w-full lg:w-8/12">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Manage Banners</h2>

         
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($banners as $index => $banner)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                    <p class="text-gray-800 font-semibold text-center py-2 text-sm">ID: {{ $index + 1 }}</p>
                    <img src="{{ asset('storage/' . $banner->image) }}" 
                         class="w-full h-48 sm:h-60 object-cover p-2" 
                         alt="Banner {{ $index + 1 }}" />
                    <div class="p-4">
                        <div class="flex justify-between items-center gap-3">
                            <a href="#" 
                               wire:click="editBanner({{ $banner->id }})" 
                               class="flex-1 text-center bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 text-sm">
                               Edit
                            </a>
                            <a href="#" 
                               wire:confirm="Are you sure you want to delete this?" 
                               wire:click="deleteBanner({{ $banner->id }})" 
                               class="flex-1 text-center bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 text-sm">
                               Delete
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($banners->hasPages())
            <div class="mt-6">
                {{ $banners->links() }}
            </div>
            @endif
        </div>
    </div>
</div>