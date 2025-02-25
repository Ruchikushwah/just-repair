<div class="w-full  px-10 py-8 sm:rounded-lg">
<h2 class="text-xl font-semibold mb-2">Manage Appointment </h2>
        <div class="mb-6 relative">
            <input type="text" wire:model.live.debounce.150ms="search" placeholder="Search Services..." class="w-full rounded-md border-gray-300 border bg-white py-2 pl-10 pr-4 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <svg class="absolute left-3 top-2.5 h-5 w-5 text-teal-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18a7.5 7.5 0 006.15-3.35z" />
            </svg>
        </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Job no
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $index=> $appointment)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <td class="px-6 py-4">
                    {{ $index + 1}}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $appointment->job_no }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $appointment->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $appointment->pref_date }}
                </td>
                <td class="px-6 py-4">
                    {{ $appointment->address }}
                </td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="#" class="font-medium  dark:text-blue-500 bg-teal-600   text-white px-4 py-1 rounded-md">Edit</a>
                    <a href="#" wire:click="deleteAppointment({{$appointment }})" class="font-medium bg-red-600 text-white px-4 py-1 rounded-md ">delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>