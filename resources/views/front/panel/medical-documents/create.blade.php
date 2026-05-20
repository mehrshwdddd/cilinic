<x-app-layout>

<div class="max-w-2xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6">
            Upload Medical Document
        </h1>

        <form method="POST"
              action="{{ route('medical-documents.store') }}"
              enctype="multipart/form-data"
              class="bg-white p-6 rounded-xl shadow space-y-5">

            @csrf

            <div>
                <label>Patient</label>
                <select name="patient_id" class="w-full border rounded p-3">

                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">
                            {{ $patient->first_name }}
                            {{ $patient->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>Title</label>
                <input type="text" name="title" class="w-full border rounded p-3">
            </div>

            <div>
                <label>File</label>
                <input type="file" name="file" class="w-full border rounded p-3">
            </div>
            <button class="bg-blue-500 text-white px-5 py-3 rounded">
                Upload
            </button>
        </form>
</div>
</x-app-layout>

