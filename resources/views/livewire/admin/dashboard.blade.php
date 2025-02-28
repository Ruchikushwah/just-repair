<div class="flex-grow p-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Appointments Card -->
        <div class="bg-white border border-slate-400 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>

                    <h3 class="text-xl font-medium text-gray-700">Total Appointments</h3>
                    <a href="{{ route('admin.manage-appointment') }}" class="block px-1">
                        <span class="text-sm text-slate-600">View All</span>
                    </a>
                    <p class="text-3xl font-bold text-blue-600">{{$totalAppointments}}</p>

                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-6-6 6-6M5 5l6 6-6 6" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white border border-slate-400  rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-medium text-gray-700">Total Services</h3>
                    <a href="{{ route('admin.manage-service') }}" class="block px-1">
                        <span class="text-sm text-slate-600">View All</span>
                    </a>
                    <p class="text-3xl font-bold text-green-600">{{ $totalServices }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-white border border-slate-400 rounded-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-medium text-gray-700">Total Users</h3>
                    <a href="{{ route('admin.manage-user') }}" class="block px-1">
                        <span class="text-sm text-slate-600">View All</span>
                    </a>
                    <p class="text-3xl font-bold text-purple-600">{{$totalUsers}}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 14l-4-4m0 0l-4 4m4-4v12" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex">
        <div>
            <div class="flex flex-1 h-96 mt-6">
                <canvas id="myChart"></canvas>
            </div>
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
                });
            </script>
        </div>
        <div>
            <div class="flex flex-1 h-96 mt-6 p-8" >
                <canvas id="charts"></canvas>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const cta = document.getElementById('charts');

                new Chart(cta, {
                    type: 'pie',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label:'User Logins by Month',
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
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>

    </div>

</div>