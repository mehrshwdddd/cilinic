<x-app-layout>

    <div class="max-w-7xl mx-auto p-6">

        <h1 class="text-4xl font-bold mb-8">
            Reports
        </h1>

        <form method="GET"
              class="bg-white p-6 rounded-2xl shadow mb-8 grid md:grid-cols-4 gap-4">

            <div>

                <label class="block mb-2 font-semibold">
                    Status
                </label>

                <select name="status[]"
                        multiple
                        class="w-full border rounded-xl p-3 h-32">

                    <option value="pending">
                        Pending
                    </option>

                    <option value="approved">
                        Approved
                    </option>

                    <option value="cancelled">
                        Cancelled
                    </option>

                </select>

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    From Date
                </label>
                <input type="date" name="from_date" value="{{ request('from_date') }}" class="w-full border rounded-xl p-3">
            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    To Date
                </label>

                <input type="date"
                       name="to_date"
                       value="{{ request('to_date') }}"
                       class="w-full border rounded-xl p-3">

            </div>

            <div>

                <label class="block mb-2 font-semibold">
                    Patient
                </label>
                <input type="text"
                       name="patient"
                       value="{{ request('patient') }}" placeholder="Name or national code" class="w-full border rounded-xl p-3">
            </div>

            <div class="md:col-span-4">
                <button class="bg-blue-500 text-white px-6 py-3 rounded-xl">
                    Generate Report
                </button>
            </div>
        </form>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">
                <thead class="bg-gray-100">
                <tr>
                    <th class="p-4 text-left">
                        Patient
                    </th>
                    <th class="p-4 text-left">
                        National Code
                    </th>
                    <th class="p-4 text-left">
                        Date
                    </th>
                    <th class="p-4 text-left">
                        Time
                    </th>
                    <th class="p-4 text-left">
                        Status
                    </th>

                </tr>
                </thead>

                <tbody>

                @foreach($appointments as $appointment)

                    <tr class="border-t">
                        <td class="p-4">
                            {{ $appointment->patient->first_name }}
                            {{ $appointment->patient->last_name }}
                        </td>
                        <td class="p-4">
                            {{ $appointment->patient->national_code }}
                        </td>
                        <td class="p-4">
                            {{ $appointment->appointment_date }}
                        </td>
                        <td class="p-4">
                            {{ $appointment->appointment_time }}
                        </td>
                        <td class="p-4">
                            {{ $appointment->status }}
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $appointments->links() }}
        </div>
    </div>
</x-app-layout>
