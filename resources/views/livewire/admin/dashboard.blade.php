<div class="flex-grow px-4 sm:px-6 lg:px-10 py-6 bg-white">
    <!-- Stat Cards -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Appointments Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg sm:text-xl font-medium text-gray-700">Total Appointments</h3>
                    <a href="{{ route('admin.manage-appointment') }}" class="block px-1">
                        <span class="text-sm text-slate-600 hover:text-blue-600">View All</span>
                    </a>
                    <p class="text-2xl sm:text-3xl font-bold text-blue-600 mt-2">{{ $totalAppointments }}</p>
                </div>
                <div class="bg-blue-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-6-6 6-6M5 5l6 6-6 6" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Services Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg sm:text-xl font-medium text-gray-700">Total Services</h3>
                    <a href="{{ route('admin.manage-service') }}" class="block px-1">
                        <span class="text-sm text-slate-600 hover:text-green-600">View All</span>
                    </a>
                    <p class="text-2xl sm:text-3xl font-bold text-green-600 mt-2">{{ $totalServices }}</p>
                </div>
                <div class="bg-green-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg sm:text-xl font-medium text-gray-700">Total Users</h3>
                    <a href="{{ route('admin.manage-user') }}" class="block px-1">
                        <span class="text-sm text-slate-600 hover:text-purple-600">View All</span>
                    </a>
                    <p class="text-2xl sm:text-3xl font-bold text-purple-600 mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-purple-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14l-4-4m0 0l-4 4m4-4v12" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="max-w-7xl mx-auto mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Bar Chart -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Appointments by Month</h3>
            <div class="h-64 sm:h-80">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-lg font-medium text-gray-700 mb-4">User Logins by Month</h3>
            <div class="h-64 sm:h-80">
                <canvas id="charts"></canvas>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto mt-8">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Recent Pending Appointments</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-6 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Job No</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Date</th>
                            <th scope="col" class="px-6 py-3">Contact</th>
                            <th scope="col" class="px-6 py-3">Address</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingAppointments as $index => $appointment)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->job_no }}</th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->name }}</th>
                            <td class="px-6 py-4">{{ $appointment->pref_date }}</td>
                            <td class="px-6 py-4">{{ $appointment->contact_no }}</td>
                            <td class="px-6 py-4">{{ $appointment->address }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-md">{{ $appointment->status }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.view-appointment', ['appointmentId' => $appointment->id]) }}" class="flex-1 text-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($appointmentLabels),
                datasets: [{
                    label: 'Appointments by Month',
                    data: @json($appointmentData),
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(233, 30, 99, 0.6)',
                        'rgba(0, 150, 136, 0.6)',
                        'rgba(255, 87, 34, 0.6)',
                        'rgba(63, 81, 181, 0.6)',
                        'rgba(139, 195, 74, 0.6)',
                        'rgba(244, 67, 54, 0.6)',
                    ],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const cta = document.getElementById('charts');
        new Chart(cta, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'User Logins by Month',
                    data: @json($data),
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(83, 92, 145)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                        'rgb(110, 172, 218)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</div>