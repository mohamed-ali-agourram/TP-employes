<x-layout>
    <div class="p-4 bg-white rounded shadow">
        <p class="text-xl font-bold text-gray-800">{{ $project->titre }}</p>
        <p class="text-lg text-gray-600">{{ $project->description }}</p>
        <p style="text-decoration: underline">Employees</p>
        @foreach ($project->employees as $employee)
            <p>{{ $employee->nom }}</p>
        @endforeach
        <div class="mt-4">
            <a href="{{ route('employee.edit', $project->id) }}" class="text-blue-500 hover:underline mr-2">Modifier</a>
            <form action="{{ route('employee.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">Supprimer</button>
            </form>
        </div>
    </div>
</x-layout>
