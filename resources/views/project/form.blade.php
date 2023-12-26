<x-layout>
    @php
        $is_update = isset($project);
    @endphp
    <form action="{{ $is_update ? route('project.update', $project->id) : route('project.store') }}" method="post"
        class="bg-white p-4 rounded shadow-md" enctype="multipart/form-data">
        @csrf
        @if ($is_update)
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="titre" class="block text-gray-600 font-semibold">Titre</label>
            <input type="text" id="titre" name="titre" value="{{ $is_update ? $project->titre : old('titre') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('titre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="employees" class="block text-gray-600 font-semibold">employees</label>
            <select name="employees[]" id="employees" multiple
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
                @php
                    if (isset($project)) {
                        $assignedEmployees = $project
                            ->employees()
                            ->pluck('employees.id')
                            ->toArray();
                    }
                @endphp
                @isset($record)
                    @foreach ($employees as $employee)
                        <option @selected(in_array($employee->id, $assignedEmployees)) value="{{ $employee->id }}">{{ $employee->nom }}</option>
                    @endforeach
                @else
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nom }}</option>
                    @endforeach
                @endisset
            </select>
            @error('employees')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-600 font-semibold">Description</label>
            <textarea cols="7" rows="7" type="text" id="description" name="description"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">{{ $is_update ? $project->description : old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button class="bg-[#333333f0] mt-3 text-white font-bold py-2 px-4 rounded">
            {{ $is_update ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
</x-layout>
