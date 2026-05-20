<x-app-layout>

    <div class="max-w-3xl mx-auto p-6">

        <h1 class="text-4xl font-bold mb-8 text-gray-800">
            Clinic Settings
        </h1>

        <form method="POST"
              action="{{ route('settings.update') }}"
              class="bg-white p-8 rounded-3xl shadow-xl space-y-6 border border-gray-100">

            @csrf
            @method('PUT')

            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Clinic Name
                </label>

                <input type="text"
                       name="clinic_name"
                       value="{{ $setting->clinic_name ?? '' }}"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Phone Number
                </label>

                <input type="text"
                       name="phone"
                       value="{{ $setting->phone ?? '' }}"
                       class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">

            </div>

            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Address
                </label>

                <textarea name="address"
                          rows="4"
                          class="w-full border border-gray-300 rounded-2xl p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">{{ $setting->address ?? '' }}</textarea>

            </div>

            <div>

                <label class="block mb-3 font-semibold text-gray-700">
                    Select Clinic Location
                </label>

                <input type="hidden"
                       id="map_lat"
                       name="map_lat"
                       value="{{ $setting->map_lat ?? '35.699739' }}">

                <input type="hidden"
                       id="map_lng"
                       name="map_lng"
                       value="{{ $setting->map_lng ?? '51.338097' }}">

                <div id="map"
                     class="w-full h-[400px] rounded-3xl border border-gray-300 overflow-hidden shadow">
                </div>

                <p class="text-sm text-gray-500 mt-3">
                    Click on the map to select clinic location
                </p>

            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 transition text-white font-bold py-4 rounded-2xl shadow-lg">
                Save Settings
            </button>

        </form>

    </div>

    <link rel="stylesheet"
          href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css"/>

    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js"></script>

    <script>

        const defaultLat = document.getElementById('map_lat').value;
        const defaultLng = document.getElementById('map_lng').value;

        const map = new L.Map('map', {
            key: 'web.6046451f609047d98e1722e58f4e5baf',
            maptype: 'dreamy',
            poi: true,
            traffic: false,
            center: [defaultLat, defaultLng],
            zoom: 14
        });

        let marker = L.marker([defaultLat, defaultLng]).addTo(map);

        map.on('click', function (e) {

            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            marker.setLatLng([lat, lng]);

            document.getElementById('map_lat').value = lat;
            document.getElementById('map_lng').value = lng;

        });

    </script>

</x-app-layout>
