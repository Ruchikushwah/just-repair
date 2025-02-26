<div class="mt-18 px-10 py-5">
    <h2 class="text-3xl font-semibold mb-10 text-gray-900">📅 My Bookings</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($appointments as $appointment)
            <div class="bg-gradient-to-br from-white to-blue-50 shadow rounded-3xl p-8 hover:scale-105 transform transition-transform duration-300">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-3xl font-semibold text-blue-900">{{ $appointment->user->name ?? 'N/A' }}</h3>
                    <span class="text-sm px-4 py-1 rounded-full {{ $appointment->status === 'completed' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                        {{ ucfirst($appointment->status) ?? 'Pending' }}
                    </span>
                </div>

                <div class="space-y-2">
                    <p class="text-blue-800 font-medium flex gap-2">📆 Preferred Date & Time:<br>
                        <span class="bg-yellow-300 text-black px-3 py-1 rounded-lg ">{{ $appointment->pref_date ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2">📋 Requirements:<br>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-lg">{{ $appointment->requirement->requirement ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2">📞 Contact No.:<br>
                        <span class="text-gray-700">{{ $appointment->user->contact_no ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2">🔖 Complain No.:<br>
                        <span class="text-red-500  px-3 py-1 rounded-lg">{{ $appointment->job_no ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2">🏠 Address:<br>
                        <span class="text-gray-700">{{ $appointment->address ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2 ">🌆 City:<br>
                        <span class="text-gray-700">{{ $appointment->city ?? 'N/A' }}</span>
                    </p>

                    <p class="text-blue-800 font-medium flex gap-2">📍 Landmark:<br>
                        <span class="text-gray-700">{{ $appointment->landmark ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    @if($appointments->isEmpty())
        <p class="text-gray-500 mt-12 text-center">No bookings found. Book a service to see your appointments.</p>
    @endif
</div>
