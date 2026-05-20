<x-app-layout>

<div class="max-w-7xl mx-auto p-6">
    <div class="flex place-content-between mb-10">
        <h1 class="text-3xl font-bold mb-6">
            Medical Documents
        </h1>
        <a href="{{ route('medical-documents.create') }}"
           class="bg-purple-500 text-white px-5 py-3 rounded-2xl shadow transition font-semibold">
            create Medical Documents
        </a>
    </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">
                        Patient
                    </th>
                    <th class="p-3 text-left">
                        Title
                    </th>
                    <th class="p-3 text-left">
                        File
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($documents as $document)

                    <tr class="border-t">
                        <td class="p-3">
                            {{ $document->patient->first_name }}
                            {{$document->patient->last_name}}
                        </td>
                        <td class="p-3">
                            {{ $document->title }}
                        </td>
                        <td class="p-3">
                            <a href="{{ asset('storage/'.$document->file) }}" target="_blank" class="text-blue-500">
                                View File
                            </a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
