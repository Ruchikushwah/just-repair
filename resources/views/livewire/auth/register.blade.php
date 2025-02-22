<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="flex flex-col md:flex-row w-full md:w-2/3 border border-gray-300 rounded-lg overflow-hidden">

        <!-- Left Side: Registration Form -->
        <div class="w-full md:w-1/2 bg-white p-10">
            <h2 class="text-3xl font-light text-gray-800 mb-6">Sign up</h2>
            <form wire:submit.prevent="register" class="space-y-6">
                <div>
                    <input type="text" wire:model="name" placeholder="name"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-green-600">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <input type="email" wire:model="email" placeholder="E-mail"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-green-600">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="number" wire:model="contact" placeholder="phone no."
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-green-600">
                    @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input type="password" wire:model="password" placeholder="Password"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-green-600">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <input type="password" wire:model="password_confirmation" placeholder="Retype password"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-green-600">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded mt-4 hover:bg-green-700">
                    SIGN ME UP
                </button>
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="w-full md:w-1/2 h-64 md:h-auto bg-cover bg-center"
            style="background-image: url('sign up.avif');">
        </div>
    </div>
</div>