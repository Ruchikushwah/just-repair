<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4">
    <div class="max-w-md w-full bg-white rounded-lg shadow-xl overflow-hidden">
        <div class="bg-[#535C91] px-6 py-8 text-white text-center">
            <div class="mb-4 success-animation">
                <div class="checkmark-circle">
                    <div class="checkmark-stem"></div>
                    <div class="checkmark-kick"></div>
                </div>
            </div>
            <h1 class="text-2xl font-bold mb-2">Booking Successful!</h1>
            <p class="text-lg">Your repair service has been booked</p>
        </div>
        
        <div class="p-6">
            <div class="bg-gray-50 p-4 rounded-lg mb-6 text-center">
                <p class="text-sm text-gray-600 mb-1">Your Job Number</p>
                <h3 class="text-2xl font-mono font-bold text-[#535C91]">{{ $jobNumber }}</h3>
                <p class="text-xs text-gray-500 mt-1">(Save this for future reference)</p>
            </div>
            
            <div class="space-y-4 mb-6">
                <div class="flex items-center">
                    <div class="bg-[#EEF2FF] p-2 rounded-full">
                        <i class="fas fa-calendar-check text-[#535C91]"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-700">Appointment Date</p>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($appointment->pref_date)->format('d M, Y') }}</p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="bg-[#EEF2FF] p-2 rounded-full">
                        <i class="fas fa-clock text-[#535C91]"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-700">Appointment Time</p>
                        <p class="text-sm text-gray-600">
                            @if($appointment->time == '09:00:00')
                                Morning (9AM - 12PM)
                            @elseif($appointment->time == '13:00:00')
                                Afternoon (1PM - 4PM)
                            @else
                                Evening (5PM - 8PM)
                            @endif
                        </p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="bg-[#EEF2FF] p-2 rounded-full">
                        <i class="fas fa-tools text-[#535C91]"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-700">Service</p>
                        <p class="text-sm text-gray-600">{{ $appointment->service->name }} - {{ $appointment->serviceOn->name }}</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t pt-6 flex flex-col sm:flex-row justify-between gap-3">
                <a href="{{ route('home') }}" class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium hover:bg-gray-200 transition text-center">
                    <i class="fas fa-home mr-2"></i> Back to Home
                </a>
                <a href="{{ route('my-booking') }}" class="px-6 py-2 bg-[#535C91] text-white rounded-lg font-medium hover:bg-[#414A78] transition text-center">
                    <i class="fas fa-clipboard-list mr-2"></i> Track My Booking
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    /* Success Animation */
    .success-animation {
        margin: 0 auto;
        width: 80px;
        height: 80px;
        position: relative;
    }
    
    .checkmark-circle {
        width: 80px;
        height: 80px;
        position: relative;
        display: inline-block;
        vertical-align: top;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .checkmark-circle::before {
        content: '';
        position: absolute;
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background-color: #535C91;
        top: 7.5px;
        left: 7.5px;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .checkmark-stem {
        position: absolute;
        width: 5px;
        height: 30px;
        background-color: white;
        left: 38px;
        top: 21px;
        border-radius: 5px;
        transform: rotate(45deg);
        animation: animateSuccessLong 0.75s ease both;
    }
    
    .checkmark-kick {
        position: absolute;
        width: 17px;
        height: 5px;
        background-color: white;
        left: 24px;
        top: 43px;
        border-radius: 5px;
        transform: rotate(45deg);
        animation: animateSuccessShort 0.75s ease both;
    }
    
    @keyframes animateSuccessLong {
        0% {
            width: 0;
            right: 46px;
            top: 54px;
        }
        65% {
            width: 0;
            right: 46px;
            top: 54px;
        }
        84% {
            width: 55px;
            right: 0px;
            top: 35px;
        }
        100% {
            width: 30px;
            right: 0px;
            top: 21px;
        }
    }
    
    @keyframes animateSuccessShort {
        0% {
            width: 0;
            right: 46px;
            top: 37px;
        }
        65% {
            width: 0;
            right: 46px;
            top: 37px;
        }
        84% {
            width: 17px;
            right: 0px;
            top: 37px;
        }
        100% {
            width: 17px;
            right: 0px;
            top: 43px;
        }
    }
</style>
