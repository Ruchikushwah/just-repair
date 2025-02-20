<form wire:submit.prevent="login" class="flex flex-col items-center justify-center mt-20">
    <input type="email" wire:model="email" placeholder="Email">
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <input type="password" wire:model="password" placeholder="Password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Login</button>
</form>