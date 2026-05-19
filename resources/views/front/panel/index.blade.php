<div class="p-6 max-w-7xl mx-auto">

        <h1 class="text-4xl font-bold mb-8">
            Panel
        </h1>

        <div class="grid md:grid-cols-4 gap-6 mb-10">

            <div class="bg-white p-6 rounded-2xl shadow">

                <h2 class="text-gray-500 mb-2">
                    Patients
                </h2>

                <p class="text-4xl font-bold">
                    {{ $patientsCount }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <h2 class="text-gray-500 mb-2">
                    Appointments
                </h2>

                <p class="text-4xl font-bold">
                    {{ $appointmentsCount }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <h2 class="text-gray-500 mb-2">
                    Pending
                </h2>

                <p class="text-4xl font-bold">
                    {{ $pendingAppointments }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <h2 class="text-gray-500 mb-2">
                    Documents
                </h2>

                <p class="text-4xl font-bold">
                    {{ $documentsCount }}
                </p>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-bold mb-5">

                Latest Appointments

            </h2>

            <table class="w-full">

                <thead>

                <tr class="border-b">

                    <th class="text-left p-3">
                        Patient
                    </th>

                    <th class="text-left p-3">
                        Date
                    </th>

                    <th class="text-left p-3">
                        Time
                    </th>

                    <th class="text-left p-3">
                        Status
                    </th>

                </tr>

                </thead>

                <tbody>

                @foreach($latestAppointments as $appointment)

                    <tr class="border-b">

                        <td class="p-3">

                            {{ $appointment->patient->first_name }}

                            {{ $appointment->patient->last_name }}

                        </td>

                        <td class="p-3">

                            {{ $appointment->appointment_date }}

                        </td>

                        <td class="p-3">

                            {{ $appointment->appointment_time }}

                        </td>

                        <td class="p-3">

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">

                                {{ $appointment->status }}

                            </span>

                        </td>

                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
