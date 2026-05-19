<x-app-layout>
<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">

            Appointments

        </h1>

    </div>

    <form method="GET"
          class="bg-white p-5 rounded-2xl shadow mb-6 grid md:grid-cols-3 gap-4">

        <input type="text"
               name="search"
               placeholder="Search patient..."
               value="{{ request('search') }}"
               class="border rounded-xl p-3">

        <select name="status"
                class="border rounded-xl p-3">

            <option value="">
                All Status
            </option>

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

        <button class="bg-blue-500 text-white rounded-xl">

            Filter

        </button>

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

                <th class="p-4 text-left">
                    Actions
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

                        <form method="POST"
                              action="{{ route('appointments.status', $appointment) }}">

                            @csrf
                            @method('PATCH')

                            <select name="status"
                                    onchange="this.form.submit()"
                                    class="border rounded p-2">

                                <option value="pending"
                                    @selected($appointment->status == 'pending')>

                                    Pending

                                </option>

                                <option value="approved"
                                    @selected($appointment->status == 'approved')>

                                    Approved

                                </option>

                                <option value="cancelled"
                                    @selected($appointment->status == 'cancelled')>

                                    Cancelled

                                </option>

                            </select>

                        </form>

                    </td>

                    <td class="p-4">

                        <form method="POST"
                              action="{{ route('appointments.destroy', $appointment) }}">

                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
                                Delete
                            </button>

                        </form>

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
