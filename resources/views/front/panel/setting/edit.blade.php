
<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">

        <h1 class="text-4xl font-bold mb-8">
            Clinic Settings
        </h1>

        <form method="POST"
              action="{{ route('settings.update') }}"
              class="bg-white p-6 rounded-2xl shadow space-y-5">

            @csrf
            @method('PUT')

            <div>

                <label class="block mb-2 font-semibold">
                    Clinic Name
                </label>

                <input type="text"
                       name="clinic_name"
                       value="{{ $setting->clinic_name ?? '' }}"
                       class="w-full border rounded-xl p-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Phone Number
                </label>
                <input type="text" name="phone" value="{{ $setting->phone ?? '' }}" class="w-full border rounded-xl p-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Address
                </label>

                <textarea name="address" class="w-full border rounded-xl p-3" rows="4">{{ $setting->address ?? '' }}</textarea>

            </div>

            <div>
                <label class="block mb-2 font-semibold">
                    Map address
                </label>
                <textarea name="map_iframe" class="w-full border rounded-xl p-3" rows="5">{{ $setting->map_iframe ?? '' }}</textarea>

            </div>

            <button class="bg-blue-500 text-white px-5 py-3 rounded-xl">
                Save Settings
            </button>

        </form>

    </div>
</x-app-layout>
