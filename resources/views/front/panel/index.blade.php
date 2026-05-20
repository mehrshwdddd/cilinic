<x-app-layout>

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-800">
                        Panel
                    </h1>
                </div>

                @if(auth()->user()->isSecretary())

                    <div class="flex flex-wrap gap-3 mt-5 md:mt-0">
                        <a href="{{ route('settings.edit') }}"
                           class="bg-teal-400 text-white px-5 py-3 rounded-2xl shadow transition font-semibold">
                            Settings
                        </a>
                        <a href="{{ route('reports.index') }}"
                           class="bg-blue-500 text-white px-5 py-3 rounded-2xl shadow transition font-semibold">
                            Reports
                        </a>
                        <a href="{{ route('appointments.index') }}"
                           class="bg-green-500 text-white px-5 py-3 rounded-2xl shadow transition font-semibold">
                            Appointments
                        </a>
                        <a href="{{ route('medical-documents.index') }}"
                           class="bg-purple-500 text-white px-5 py-3 rounded-2xl shadow transition font-semibold">
                            Medical Documents
                        </a>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">
                                Patients
                            </p>
                            <h2 class="text-4xl font-bold text-gray-800 mt-2">
                                {{ $patientsCount }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">
                                Appointments
                            </p>
                            <h2 class="text-4xl font-bold text-gray-800 mt-2">
                                {{ $appointmentsCount }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">
                                Pending
                            </p>
                            <h2 class="text-4xl font-bold text-gray-800 mt-2">
                                {{ $pendingAppointments }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">
                                Documents
                            </p>
                            <h2 class="text-4xl font-bold text-gray-800 mt-2">
                                {{ $documentsCount }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Latest Appointments
                    </h2>
                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left p-5 text-gray-600 font-semibold">
                                Patient
                            </th>
                            <th class="text-left p-5 text-gray-600 font-semibold">
                                Date
                            </th>
                            <th class="text-left p-5 text-gray-600 font-semibold">
                                Time
                            </th>
                            <th class="text-left p-5 text-gray-600 font-semibold">
                                Status
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($latestAppointments as $appointment)

                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-5 font-medium text-gray-700">
                                    {{ $appointment->patient->first_name }}
                                    {{ $appointment->patient->last_name }}
                                </td>
                                <td class="p-5 text-gray-600">
                                    {{ $appointment->appointment_date }}
                                </td>
                                <td class="p-5 text-gray-600">

                                    {{ $appointment->appointment_time }}

                                </td>
                                <td class="p-5">

                                    @if($appointment->status == 'approved')
                                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                                            Approved
                                        </span>
                                    @elseif($appointment->status == 'cancelled')

                                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                                            Cancelled
                                        </span>

                                    @else
                                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
