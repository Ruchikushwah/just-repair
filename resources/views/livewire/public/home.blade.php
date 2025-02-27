<div>
    <!-- Hero Banner -->
    <div class="container mx-auto py-12 px-20 mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

            <!-- Left Side: Heading & Description -->
            <div class="flex flex-col border p-8 rounded-lg border-slate-200">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-600 mb-2">What you Looking For?</h1>
                    <input type="search" class="w-full border border-slate-300   py-2 rounded-sm ">

                </div>
                <div class="grid grid-cols-2 md:grid-cols-2 gap-6 mt-8">
                    @foreach($services as $service)
                    <a href="{{ url('/service/' . $service->id) }}" class="block w-full">

                        <div class="flex flex-col items-center bg-slate-100  rounded-lg p-4 border border-[#535C91] border-b-2">
                            
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-16 h-16 mb-2 ">

                           
                            <h3 class="text-md font-semibold text-gray-800">{{ $service->name }}</h3>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
            <!-- Right Side: Image Grid -->
            <div class="grid grid-cols-2 gap-2">

                <img src="https://picsum.photos/400/400" alt="Service 1" class="rounded-tl-lg">

                <img src="\mechanic-uses-screwdriver-tighten-screws-tv_1150-24067.jpg" alt="Service 2" class="rounded-tr-lg">
                <img src="https://picsum.photos/400/300" alt="Service 3" class="rounded-bl-lg">
                <img src="https://picsum.photos/400/420" alt="Service 4" class="rounded-br-lg -mt-24">
            </div>
        </div>
        <div class="mt-12 flex overflow-x-auto space-x-4 scrollbar-hide">
            @foreach($banners as $banner)
            <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="min-w-[40%] md:min-w-[30%] h-72 object-cover rounded-lg">
            @endforeach
        </div>


    </div>





</div>