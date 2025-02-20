<form wire:submit.prevent="register">
    <input type="text" wire:model="name" placeholder="Name">
    @error('name') <span class="error">{{ $message }}</span> @enderror

    <input type="email" wire:model="email" placeholder="Email">
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <input type="password" wire:model="password" placeholder="Password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <input type="password" wire:model="password_confirmation" placeholder="Confirm Password">

    <button type="submit">Register</button>
</form>