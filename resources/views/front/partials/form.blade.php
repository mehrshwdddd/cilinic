<form method="POST"
      action="{{ route('appointments.store') }}"
      class="max-w-lg mx-auto p-8 bg-white rounded-2xl shadow-xl space-y-6">

    @csrf

    <div>

        <label class="block text-sm font-semibold mb-1">
            First Name
        </label>

        <input type="text"
               name="first_name"
               value="{{ old('first_name') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('first_name')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold mb-1">
            Last Name
        </label>

        <input type="text"
               name="last_name"
               value="{{ old('last_name') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('last_name')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold mb-1">
            National Code
        </label>

        <input type="text"
               name="national_code"
               value="{{ old('national_code') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('national_code')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold mb-1">
            Phone Number
        </label>

        <input type="text"
               name="phone_number"
               value="{{ old('phone_number') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('phone_number')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold mb-1">
            Appointment Date
        </label>

        <input type="date"
               name="appointment_date"
               value="{{ old('appointment_date') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('appointment_date')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <div>

        <label class="block text-sm font-semibold mb-1">
            Appointment Time
        </label>

        <input type="time"
               name="appointment_time"
               value="{{ old('appointment_time') }}"
               class="w-full px-4 py-3 border border-gray-300 rounded-xl">

        @error('appointment_time')

        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>

        @enderror

    </div>

    <button type="submit"
            class="w-full bg-green-500 hover:bg-green-700 transition text-white font-semibold py-3 rounded-xl">
        Submit
    </button>
</form>
