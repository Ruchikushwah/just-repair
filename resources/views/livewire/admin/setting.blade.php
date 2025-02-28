<div class="w-full mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Update Your Profile</h2>

        <!-- Success Message -->
        @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('message') }}
        </div>
        @endif


        <form wire:submit.prevent="updateProfile">
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required>
                @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <!-- Password Field (Optional) -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input
                    type="password"
                    id="password"
                    wire:model="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Leave blank if you don't want to change your password">
                @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    wire:model="password_confirmation"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-teal-600 text-white py-2 rounded-md">Save Changes</button>
        </form>
    </div>
</div>