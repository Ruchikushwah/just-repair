<div>
  <!-- Hero Section -->
  <section class="bg-blue-50 py-16">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-5xl font-bold mb-4 text-blue-800">Complete Air Conditioning Solutions</h1>
      <p class="text-lg text-blue-700 max-w-3xl mx-auto">
        From emergency repairs to energy-efficient installations, we provide a full range of air conditioning services tailored to your comfort. Serving homes, offices, and commercial spaces.
      </p>
    </div>
  </section>

  <!-- What We Offer -->
  <section class="py-20 relative z-10 p-4 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-12 text-blue-700">What We Offer</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        
        <!-- AC System Diagnosis -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">AC System Diagnosis</h3>
          <p class="text-gray-700">We start with a full diagnostic check to identify internal issues, thermostat malfunctions, refrigerant levels, and airflow blockages.</p>
        </div>
  
        <!-- Emergency Repairs -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1 4v1m-6 4h12a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v14z" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">Emergency Repairs</h3>
          <p class="text-gray-700">Sudden breakdown? Our rapid-response team is available for urgent repairs, ensuring your space stays cool when it matters most.</p>
        </div>
  
        <!-- Energy-Efficient Installations -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 4v1m0 4v1m0 4v1m-6-4h12M4 21h16a1 1 0 001-1V4a1 1 0 00-1-1H4a1 1 0 00-1 1v16a1 1 0 001 1z" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">Energy-Efficient Installations</h3>
          <p class="text-gray-700">We install modern AC units that lower your energy bills and increase indoor comfort. Includes sizing consultation and full setup.</p>
        </div>
  
        <!-- Air Duct Cleaning -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a1 1 0 00-1-1h-6l-2-2H5a1 1 0 00-1 1v6m16 6v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">Air Duct Cleaning</h3>
          <p class="text-gray-700">Improve air quality and system efficiency with professional duct inspection and cleaning services to remove dust, mold, and allergens.</p>
        </div>
  
        <!-- Preventive Maintenance -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16h16V4H4z" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">Preventive Maintenance Plans</h3>
          <p class="text-gray-700">Regular checkups, coil cleaning, and performance tuning help prevent breakdowns and keep your AC running like new all year round.</p>
        </div>
  
        <!-- Commercial HVAC Services -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 relative">
          <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 3V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2z" />
          </svg>
          <h3 class="text-2xl font-semibold text-gray-900 mb-2">Commercial HVAC Services</h3>
          <p class="text-gray-700">Full-service HVAC solutions for offices, retail spaces, and warehouses — including rooftop units, multi-zone systems, and central cooling.</p>
        </div>
  
      </div>
    </div>
  </section>
  
  <style>
    .grid > div {
      position: relative;
    }
  
    .grid > div::before {
      content: "";
      position: absolute;
      height: 100%;
      width: 100%;
      top: 0;
      left: 0;
      border-radius: 10px;
      background: rgba(10, 40, 90, 1);
      transform: rotate(0deg);
      z-index: -1;
      transition: transform 0.3s ease;
    }
  
    .grid > div:hover::before {
      transform: rotate(5deg);
    }
  </style>
  

  <!-- Service Benefits -->
  <section class="py-16 bg-blue-50">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center text-blue-800 mb-10">Why Choose Our AC Services?</h2>
      <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
        <div>
          <h4 class="text-xl font-semibold mb-2">✔ Skilled & Certified Technicians</h4>
          <p class="text-gray-700 mb-4">
            Our team is trained to handle complex AC problems with precision and professionalism.
          </p>

          <h4 class="text-xl font-semibold mb-2">✔ Transparent Pricing</h4>
          <p class="text-gray-700 mb-4">
            No hidden charges. Honest quotes provided upfront after initial inspection.
          </p>

          <h4 class="text-xl font-semibold mb-2">✔ Eco-Friendly Practices</h4>
          <p class="text-gray-700">
            We use eco-friendly refrigerants and dispose of old units responsibly.
          </p>
        </div>
        <div>
          <h4 class="text-xl font-semibold mb-2">✔ Service Coverage</h4>
          <p class="text-gray-700 mb-4">
            Serving both residential and commercial customers across multiple locations.
          </p>

          <h4 class="text-xl font-semibold mb-2">✔ Fast Response</h4>
          <p class="text-gray-700 mb-4">
            Quick turnaround time for repair calls and routine service appointments.
          </p>

          <h4 class="text-xl font-semibold mb-2">✔ Guaranteed Satisfaction</h4>
          <p class="text-gray-700">
            Our work is backed by a satisfaction guarantee and optional service warranties.
          </p>
        </div>
      </div>
    </div>
  </section>
</div>
