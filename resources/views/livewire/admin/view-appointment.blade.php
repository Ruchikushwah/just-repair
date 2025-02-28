<div class="w-full mx-auto p-8 bg-gradient-to-br from-gray-100 to-gray-50 rounded-xl">

    <div class="border border-slate-200 p-8 rounded-xl">
        <div class=" flex justify-between">

            <a href="{{ route('admin.manage-appointment') }}" class="font-medium bg-teal-600 text-white px-4 py-1 mb-4 rounded-md">Back</a>

            @if (session()->has('message'))
            <div class="text-green-600 font-semibold"> {{ session('message') }}</div>
            @endif
        </div>

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">🔹 {{ $appointment->name }}'s Service Details</h2>

        <div class="grid grid-cols-2 gap-6 border-t border-gray-300 pt-4">
            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Appointment ID:</span>
                <span class="text-gray-900 font-bold">{{ $appointment->id }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium">Complaint No:</span>
                <span class="px-3 py-1 rounded-lg bg-slate-500 text-white font-semibold">{{ $appointment->job_no }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Name:</span>
                <span class="text-gray-900">{{ $appointment->name }}</span>
            </div>


            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Service:</span>
                <span class="text-gray-900">{{ $appointment->service->name }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium">Preferred Time:</span>
                <span class="px-3 py-1 rounded-lg bg-yellow-500 text-white font-semibold">
                    {{ \Carbon\Carbon::parse($appointment->pref_date)->format('Y-m-d (h A - h A)') }}
                </span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Address:</span>
                <span class="text-gray-900">{{ $appointment->address }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Requirements:</span>
                <span class="px-3 py-1 rounded-lg bg-green-500 text-white font-semibold">{{ $appointment->requirement }}</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-gray-700 font-medium"> Created On:</span>
                <span class="text-gray-900">{{ $appointment->created_at->format('m/d/Y, h:i:s A') }}</span>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-300 pt-4">
            <label for="status" class="block text-lg font-medium text-gray-700"> Update Status</label>
            <div class="flex items-center space-x-4 mt-2">
                <select wire:model="newStatus" id="status" class="w-full border border-gray-400 p-3 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="Pending">Pending</option>
                    <option value="Process">Process</option>
                    <option value="Accept">Accept</option>
                    <option value="Reject">Reject</option>
                    <option value="Done">Done</option>
                </select>
                <button wire:click="updateStatus" class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-orange-700 transition-all">Update</button>
            </div>
        </div>
    </div>


</div>