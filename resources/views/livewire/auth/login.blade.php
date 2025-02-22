<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="flex flex-col md:flex-row w-full md:w-2/3 border border-gray-300  rounded-lg overflow-hidden">
        
        <!-- Left Side: Image -->
        <div class="w-full md:w-1/2 h-64 md:h-auto bg-cover bg-center"
            style="background-image: url('sign up.avif');">
        </div>

        <!-- Right Side: Login Form -->
        <div class="w-full md:w-1/2 bg-white p-10 flex flex-col items-center">
            <h2 class="text-3xl font-light text-gray-800 mb-6">Login</h2>
            <form wire:submit.prevent="login" class="w-full max-w-sm space-y-6">
                <div>
                    <input type="email" wire:model="email" placeholder="Email"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-blue-600">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <input type="password" wire:model="password" placeholder="Password"
                        class="w-full border-b border-gray-400 p-2 focus:outline-none focus:border-blue-600">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full bg-slate-800 text-white py-3 rounded mt-4 hover:bg-blue-700">
                    LOGIN
                </button>

                <p class="text-gray-600 text-sm text-center">
                    Don't have an account? <a href=" {{ route('auth.register')}}" class="text-blue-600 hover:underline">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>
