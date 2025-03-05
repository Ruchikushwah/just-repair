<div class=" px-8 py-6 bg-gray-900 min-h-screen">
    <h2 class="text-4xl font-semibold mb-12 text-white">My Bookings</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($appointments as $appointment)
            <div class="bg-gray-800 shadow-lg rounded-2xl overflow-hidden hover:scale-105 transition-transform duration-300 hover:shadow-xl">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white p-6 flex justify-between items-center rounded-t-2xl">
                    <h3 class="text-2xl font-semibold truncate">{{ $appointment->user->name ?? 'N/A' }}</h3>
                    <span class="text-xs px-4 py-1 rounded-full {{ $appointment->status === 'completed' ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ ucfirst($appointment->status) ?? 'Pending' }}
                    </span>
                </div>

                <div class="p-6 space-y-4 text-gray-300">
                    <p class=""><span class="font-semibold text-gray-400">Preferred Date & Time:</span>
                        <span class="bg-yellow-400 text-gray-900 px-3 py-1 rounded-lg">{{ $appointment->pref_date ?? 'N/A' }}</span>
                    </p>

                    <p class=""><span class="font-semibold text-gray-400">Requirements:</span>
                        <span class="bg-green-600 text-white px-3 py-1 rounded-lg">{{ $appointment->requirement->requirement ?? 'N/A' }}</span>
                    </p>

                    <p class="flex items-center"><span class="font-semibold text-gray-400">Contact No.:</span>
                        <i class="fas fa-phone-alt text-blue-400 mr-2"></i><span>{{ $appointment->user->contact_no ?? 'N/A' }}</span>
                    </p>

                    <p class=""><span class="font-semibold text-gray-400">Complain No.:</span>
                        <span class="text-red-400 px-3 py-1 rounded-lg">{{ $appointment->job_no ?? 'N/A' }}</span>
                    </p>

                    <p class=""><span class="font-semibold text-gray-400">Address:</span>
                        <span>{{ $appointment->address ?? 'N/A' }}</span>
                    </p>

                    <p class=""><span class="font-semibold text-gray-400">City:</span>
                        <span>{{ $appointment->city ?? 'N/A' }}</span>
                    </p>

                    <p class=""><span class="font-semibold text-gray-400">Landmark:</span>
                        <span>{{ $appointment->landmark ?? 'N/A' }}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    @if($appointments->isEmpty())
        <p class="text-gray-400 mt-12 text-center">No bookings found. Book a service to see your appointments.</p>
    @endif
</div>