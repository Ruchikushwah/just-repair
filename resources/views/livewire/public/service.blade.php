<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 mt-20">
    @if ($type === 'ac-repair')
        <livewire:public.ac-repair />
    @elseif ($type === 'refrigerator-repair')
        <livewire:public.refrigerator-repair />
    @elseif ($type === 'water-purifier')
        <livewire:public.water-purifier />
    @elseif ($type === 'washing-machine')
        <livewire:public.washing-machine />
    @elseif ($type === 'geyser-repair')
        <livewire:public.geyser-repair />
    @else
        <h2 class="text-2xl font-semibold text-gray-800">Welcome to Our Services</h2>
        <p class="text-gray-500 mt-2">Please select a service to view more details.</p>
    @endif
</div>