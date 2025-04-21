<div>
<div class="flex flex-col sm:flex-row sm:justify-between gap-4">
    <a href="{{ route('admin.manage-appointment') }}"
        class="font-medium bg-teal-600 text-white px-4 py-2 rounded-md text-center hover:bg-teal-700 transition-all">
        Back
    </a>
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
        <button onclick="printInvoice()"
            class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 mr-4">Print</button>
        <button onclick="downloadInvoice()"
            class="px-6 py-3 bg-teal-500 text-white rounded-lg hover:bg-teal-600">Download</button>

        <a href="https://wa.me/7280080080" target="_blank" class=" bottom-20  z-50 bg-green-500 text-white p-3  rounded-full shadow-lg hover:bg-green-600 transition-all whatsapp-float float-end">
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