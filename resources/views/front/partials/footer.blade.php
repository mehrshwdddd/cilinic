<div class="bg-gray-900 text-gray-300 py-8 mt-10">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div>
            <h3 class="text-white font-semibold mb-3">address</h3>
            <p>{{$setting->address}}</p>
        </div>

        <div>
            <h3 class="text-white font-semibold mb-3">phone number</h3>
            <p>{{$setting->phone}}}</p>
        </div>
        <div>
            <h3 class="text-white font-semibold mb-3">clinic name</h3>
            <p>{{$setting->clinic_name}}}</p>
        </div>

        <div class="max-w-6xl mx-auto px-6 mt-8">
             {{$setting->map_address}}
        </div>
    </div>
</div>
