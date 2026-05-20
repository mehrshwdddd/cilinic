<div class="bg-gray-900 text-gray-300 py-10 mt-10">

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">

        <div>
            <h3 class="text-white font-semibold mb-3 text-lg">
                Address
            </h3>

            <p class="leading-7">
                {{ $setting->address ?? '' }}
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3 text-lg">
                Phone Number
            </h3>

            <p>
                {{ $setting->phone ?? '' }}
            </p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3 text-lg">
                Clinic Name
            </h3>

            <p>
                {{ $setting->clinic_name ?? '' }}
            </p>
        </div>

    </div>

    <div class="max-w-6xl mx-auto px-6 mt-10">

        <div id="footerMap"
             class="w-full h-[400px] rounded-3xl overflow-hidden border border-gray-700 shadow-xl">
        </div>

    </div>

</div>

<link rel="stylesheet"
      href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css"/>

<script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js"></script>

<script>

    const lat = {{ $setting->map_lat ?? 35.699739 }};
    const lng = {{ $setting->map_lng ?? 51.338097 }};

    const footerMap = new L.Map('footerMap', {
        key: 'web.6046451f609047d98e1722e58f4e5baf',
        maptype: 'dreamy',
        poi: true,
        traffic: false,
        center: [lat, lng],
        zoom: 15
    });

    L.marker([lat, lng]).addTo(footerMap);

</script>
