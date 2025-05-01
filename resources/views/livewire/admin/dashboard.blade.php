<div class="flex-grow px-4 sm:px-6 lg:px-10 py-6 bg-white">
   

    <!-- Stat Cards -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <!-- Total Appointments Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base sm:text-lg lg:text-xl font-medium text-gray-700">Total Appointments</h3>
                    <a href="{{ route('admin.manage-appointment') }}" class="block px-1">
                        <span class="text-xs sm:text-sm text-slate-600 hover:text-blue-600">View All</span>
                    </a>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-600 mt-2">{{ $totalAppointments }}</p>
                </div>
                <div class="bg-blue-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-6-6 6-6M5 5l6 6-6 6" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Services Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base sm:text-lg lg:text-xl font-medium text-gray-700">Total Services</h3>
                    <a href="{{ route('admin.manage-service') }}" class="block px-1">
                        <span class="text-xs sm:text-sm text-slate-600 hover:text-green-600">View All</span>
                    </a>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-600 mt-2">{{ $totalServices }}</p>
                </div>
                <div class="bg-green-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-white border border-slate-300 rounded-lg p-4 sm:p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base sm:text-lg lg:text-xl font-medium text-gray-700">Total Users</h3>
                    <a href="{{ route('admin.manage-user') }}" class="block px-1">
                        <span class="text-xs sm:text-sm text-slate-600 hover:text-purple-600">View All</span>
                    </a>
                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold text-purple-600 mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-purple-100 p-2 sm:p-3 rounded-full">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14l-4-4m0 0l-4 4m4-4v12" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
  
     <!-- Notification Card -->
     <div class="max-w-7xl mx-auto mt-5 sm:mt-6">
        <div class="bg-white border border-slate-300 rounded-lg p-4 sm:p-5 shadow-sm">
            <h3 class="text-base sm:text-lg lg:text-xl font-medium text-gray-700 mb-4 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75v5.408c0 .538-.214 1.055-.595 1.436L6 17h5m4 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifications
              </h3>
              
            <div class="space-y-4">
                
                <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                    <div>
                        <p class="text-sm sm:text-base text-red-500">
                            <span class="font-medium">Pending Appointments:</span> 
                            {{ $pendingAppointments->count() }} appointment(s) awaiting action.
                        </p>
                        
                    </div>
                    <div class="bg-yellow-100 p-2 sm:p-3 rounded-full">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm sm:text-base text-green-500">
                            <span class="font-medium">Done Appointments:</span> 
                            {{ $doneAppointments->count() }} appointment(s) completed.
                        </p>
                      
                    </div>
                    <div class="bg-green-100 p-2 sm:p-3 rounded-full">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 lg:w-8 lg:h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Charts -->
    <div class="max-w-7xl mx-auto mt-6 sm:mt-8 grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
        <!-- Bar Chart -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-base sm:text-lg font-medium text-gray-700 mb-4">Appointments by Month</h3>
            <div class="h-56 sm:h-64 lg:h-80">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-base sm:text-lg font-medium text-gray-700 mb-4">User Logins by Month</h3>
            <div class="h-56 sm:h-64 lg:h-80">
                <canvas id="charts"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Pending Appointments -->
    <div class="max-w-7xl mx-auto mt-6 sm:mt-8">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-sm border border-slate-300">
            <h3 class="text-base sm:text-lg font-medium text-gray-700 mb-4">Recent Upcoming Appointments</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-xs sm:text-sm text-left text-gray-500">
                    <thead class="text-xs uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="px-4 sm:px-6 py-3">Id</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Job No</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Name</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Date</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Contact</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Address</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Status</th>
                            <th scope="col" class="px-4 sm:px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingAppointments as $index => $appointment)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-4 sm:px-6 py-3">{{ $index + 1 }}</td>
                            <th scope="row" class="px-4 sm:px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->job_no }}</th>
                            <th scope="row" class="px-4 sm:px-6 py-3 font-medium text-gray-900 whitespace-nowrap">{{ $appointment->name }}</th>
                            <td class="px-4 sm:px-6 py-3">{{ $appointment->pref_date }}</td>
                            <td class="px-4 sm:px-6 py-3">{{ $appointment->contact_no }}</td>
                            <td class="px-4 sm:px-6 py-3">{{ $appointment->address }}</td>
                            <td class="px-4 sm:px-6 py-3">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-md text-xs sm:text-sm">{{ $appointment->status }}</span>
                            </td>
                            <td class="px-4 sm:px-6 py-3">
                                <a href="{{ route('admin.view-appointment', ['appointmentId' => $appointment->id]) }}" class="flex-1 text-center bg-blue-500 text-white px-3 sm:px-4 py-1 sm:py-2 rounded-md hover:bg-blue-600 text-xs sm:text-sm">View</a>
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
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: window.innerWidth < 640 ? 12 : 14
                            }
                        }
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
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: window.innerWidth < 640 ? 12 : 14
                            }
                        }
                    }
                }
            }
        });
    </script>

    <!-- Custom CSS for Enhanced Responsiveness -->
    <style>
        @media (max-width: 640px) {
            /* Stack table rows as cards on mobile */
            table {
                display: block;
            }
            thead {
                display: none;
            }
            tbody, tr {
                display: block;
            }
            tr {
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 0.5rem;
            }
            td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 1rem;
                border-bottom: 1px solid #e5e7eb;
            }
            td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #374151;
            }
            td:last-child {
                border-bottom: none;
            }
            /* Notification card mobile adjustments */
            .notification-card .space-y-4 > div {
                flex-direction: column;
                align-items: flex-start;
            }
            .notification-card .rounded-full {
                margin-top: 0.5rem;
            }
        }
    </style>
</div>