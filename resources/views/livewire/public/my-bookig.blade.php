<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 mt-20">
    <!-- Page Header -->
    <div class="max-w-7xl mx-auto mb-12">
        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl flex items-center">
            <i class="fas fa-calendar-check text-indigo-600 mr-4"></i>
            My Bookings
        </h2>
    </div>

    <!-- Bookings Grid -->
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8">
            @foreach($appointments as $appointment)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-white mb-2">{{ $appointment->user->name ?? 'N/A' }}</h3>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                    {{ $appointment->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                        'bg-red-100 text-red-800') }}">
                                    <span class="w-2 h-2 rounded-full mr-2 
                                        {{ $appointment->status === 'completed' ? 'bg-green-400' : 
                                           ($appointment->status === 'pending' ? 'bg-yellow-400' : 
                                            'bg-red-400') }}"></span>
                                    {{ ucfirst($appointment->status) ?? 'Pending' }}
                                </span>
                            </div>
                            <span class="text-white opacity-75 text-sm">
                                #{{ $appointment->job_no ?? 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Content -->
                    <div class="p-6 space-y-4">
                        <!-- Date and Time -->
                        <div class="flex items-center bg-gray-50 p-3 rounded-lg">
                            <i class="far fa-calendar-alt text-indigo-600 text-xl mr-3"></i>
                            <div>
                                <p class="text-sm text-gray-500">Appointment Date</p>
                                <p class="font-semibold text-gray-800">
                                    {{ \Carbon\Carbon::parse($appointment->pref_date)->format('d M, Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Requirements -->
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <h4 class="font-medium text-gray-700 mb-2">Service Requirements</h4>
                            <p class="text-sm text-gray-600">
                                {{ $appointment->requirement->requirement ?? 'No specific requirements' }}
                            </p>
                        </div>

                        <!-- Contact Details -->
                        <div class="border-t pt-4">
                            <div class="flex items-center mb-3">
                                <i class="fas fa-phone text-indigo-600 w-5"></i>
                                <span class="text-gray-600 ml-2">{{ $appointment->user->contact_no ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-indigo-600 w-5 mt-1"></i>
                                <div class="ml-2">
                                    <p class="text-gray-600">{{ $appointment->address ?? 'N/A' }}</p>
                                    <p class="text-gray-500 text-sm">
                                        {{ $appointment->city ?? 'N/A' }}
                                        @if($appointment->landmark)
                                            <span class="text-gray-400"> | Near {{ $appointment->landmark }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($appointments->isEmpty())
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i class="far fa-calendar-times text-6xl"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No Bookings Found</h3>
                <p class="text-gray-500">You haven't made any bookings yet.</p>
                <a href="{{ route('homepage') }}" 
                   class="inline-flex items-center justify-center mt-4 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Book a Service
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        @endif
    </div>
</div>