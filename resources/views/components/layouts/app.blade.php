<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Professional home appliance repair services for AC, refrigerator, washing machine, water purifier, and geyser repair.">
    <meta name="keywords" content="appliance repair, AC repair, refrigerator repair, washing machine repair, water purifier, geyser repair">

    <title>{{ $title ?? env('APP_NAME')}} - Home Appliance Repair Services</title>
    <link rel="shortcut icon" href="{{ asset('H.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @livewireStyles
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-bottom: 70px; /* Space for the footer */
            color: #1a1a1a;
            scroll-behavior: smooth;
        }
        
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #535C91;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #414A78;
        }
        
        .footer-icon {
            transition: all 0.3s ease;
        }
        
        .footer-icon:hover {
            transform: translateY(-5px);
            color: #535C91;
        }
        
        .whatsapp-float {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <x-header />
    
    <main class="container mx-auto mt-16">
        {{ $slot }}
    </main>
    
    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/7280080080" target="_blank" class="fixed bottom-20 right-6 z-50 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition-all whatsapp-float">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    
    <!-- Mobile Navigation Footer -->
    <footer class="fixed bottom-0 w-full bg-white border-slate-200 py-3 border-t shadow-md md:py-3 z-10">
        <div class="container mx-auto flex justify-around items-center text-gray-600">
            <a href="/" class="flex flex-col items-center hover:text-[#535C91] footer-icon">
                <i class="fa-solid fa-house text-lg"></i>
                <span class="text-xs mt-1">Home</span>
            </a>

            <a href="{{ route('my-booking') }}" class="flex flex-col items-center hover:text-[#535C91] footer-icon">
                <i class="fa-regular fa-calendar-check text-lg"></i>
                <span class="text-xs mt-1">Bookings</span>
            </a>

            <a href="#services" class="flex flex-col items-center hover:text-[#535C91] footer-icon">
                <i class="fa-solid fa-tools text-lg"></i>
                <span class="text-xs mt-1">Services</span>
            </a>

            <a href="tel:7280080080" class="flex flex-col items-center hover:text-[#535C91] footer-icon">
                <i class="fa-solid fa-phone text-lg"></i>
                <span class="text-xs mt-1">Call Now</span>
            </a>
        </div>
    </footer>
    
    @livewireScripts
</body>

</html>