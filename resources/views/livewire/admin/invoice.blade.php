<div>
    <div class="relative group">
        <button class="font-medium bg-teal-600 text-white px-4 py-2 rounded-md text-center hover:bg-teal-700 transition-all flex items-center gap-2">
            Back
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <div class="absolute hidden group-hover:block mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-20">
            <a href="{{ route('admin.manage-appointment') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-100 hover:text-teal-900">
                Manage Appointments
            </a>
            <a href="{{ route('admin.manage-invoice') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-100 hover:text-teal-900">
                Manage Invoices
            </a>
        </div>
    </div>
    <div class="max-w-4xl w-full mx-auto p-8 border border-gray-300 rounded-xl font-sans">
        <div class="flex justify-between items-center">
            <img src="/image.jpeg" alt="Company Logo" class="h-12">
            <div class="text-right">
                <h2 class="text-2xl font-semibold text-gray-800">Helphar</h2>
                <p class="text-sm">Naka Chowk, Purnea City, Bihar - 854301</p>
                <p class="text-sm">Phone: 72-800-800-80</p>
                <p class="text-sm">Email: helphar.info@gmail.com</p>
            </div>
        </div>

        <hr class="my-4">

        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-semibold">Customer Information</h3>
                <p><strong>Name:</strong> {{ $appointment->name }}</p>
                <p><strong>Contact:</strong> {{ $appointment->contact_no }}</p>
                <p><strong>Address:</strong> {{ $appointment->address }}</p>
            </div>

            <div>
                <h3 class="text-lg font-semibold">Invoice Details</h3>
                <p><strong>Invoice Number:</strong> {{ $appointment->id }}</p>
                <p><strong>Date:</strong> {{ now()->format('M d, Y h:i A') }}</p>
                <p><strong>Service Date:</strong> {{ $appointment->pref_date }}</p>
            </div>
        </div>

        <h3 class="mt-8 text-lg font-semibold">Items</h3>
        <table class="w-full border-collapse mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-4 border text-left">Item</th>
                    <th class="p-4 border text-left">Quantity</th>
                    <th class="p-4 border text-left">Price</th>
                    <th class="p-4 border text-left">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-4 border">{{ $serviceFees->name }}</td>
                    <td class="p-4 border">1</td>
                    <td class="p-4 border">₹{{ $serviceFees->fees }}</td>
                    <td class="p-4 border">₹{{ $serviceFees->fees }}</td>
                </tr>
            </tbody>
        </table>

        <div class="text-right mt-8">
            <p><strong>Subtotal:</strong> ₹{{ $serviceFees->fees }}</p>
            <p><strong>Tax:</strong> ₹0.00</p>
            <p><strong>Total:</strong> ₹{{ $serviceFees->fees }}</p>
        </div>
        <div class="mt-12 text-center print-hidden">
            @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            @if(!session()->has('success'))
            <button wire:click="saveInvoice" wire:loading.attr="disabled"
                class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 mr-4 disabled:opacity-50">
                <span wire:loading.remove wire:target="saveInvoice">Save Invoice</span>
                <span wire:loading wire:target="saveInvoice">Processing...</span>
            </button>
            @endif

            <button onclick="printInvoice()"
                class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 mr-4">
                Print
            </button>
            <button onclick="downloadInvoice()" class="px-6 py-3 bg-teal-500 text-white rounded-lg hover:bg-teal-600">
                Download
            </button>
            <a href="https://wa.me/7280080080" target="_blank"
                class=" bottom-20  z-50 bg-green-500 text-white p-3  rounded-full shadow-lg hover:bg-green-600 transition-all whatsapp-float float-end">
                <i class="fab fa-whatsapp text-2xl"></i>
            </a>
        </div>
        <style>
        @media print {
            .print-hidden {
                display: none;
            }
        }
        </style>

        <script>
        function printInvoice() {
            const content = document.querySelector('.max-w-4xl').innerHTML;
            const printWindow = window.open('', '', 'width=1200,height=800');
            printWindow.document.write(`
                <html>
                <head>
                    <title>Invoice</title>
                    <style>
                        body { font-family: Arial, sans-serif; padding: 40px; }
                        .max-w-4xl { max-width: 1024px; margin: auto; }
                        .print-hidden { display: none; }
                    </style>
                </head>
                <body>${content}</body>
                </html>
            `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }

        function downloadInvoice() {
            printInvoice();
        }
        </script>
    </div>
</div>