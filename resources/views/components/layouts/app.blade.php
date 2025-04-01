<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? env('APP_NAME')}}</title>
    {{-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
</head>

<body class="bg-white">
    <x-header />
    {{ $slot }}
    <footer class="fixed bottom-0 w-full bg-white border-slate-200 py-3 border-t shadow-sm">
        <div class="container mx-auto flex justify-center space-x-8 items-center text-gray-600">
            <a href="/" class="flex flex-col items-center hover:text-gray-900">
                <i class="fa-solid fa-house"></i>
                <span class="text-sm">Home</span>
            </a>

            <a href="{{ route('my-booking') }}" class="flex flex-col items-center hover:text-gray-900">
                <i class="fa-regular fa-calendar"></i>
                <span class="text-sm">My Booking</span>
            </a>

            <a href="https://wa.me/your-number" target="_blank" class="flex flex-col items-center hover:text-gray-900">
                <i class="fa-brands fa-whatsapp"></i>
                <span class="text-sm">WhatsApp</span>
            </a>

            <a href="tel:7280080080" class="flex flex-col items-center hover:text-gray-900">
                <i class="fa-solid fa-phone"></i>
                <span class="text-sm">7280080080</span>
            </a>
        </div>
    </footer>
    @livewireScripts
</body>

</html>