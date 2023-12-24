<x-layout>
    <div class="p-4 bg-white rounded shadow">
        <p class="text-xl font-bold text-gray-800">{{ $employee->nom }}</p>
        <img src="{{ asset('storage/' . $employee->image) }}" width="80px" height="80px">
        <p class="text-lg text-gray-600">{{ $employee->prenom }}</p>
        <p class="text-sm text-gray-500">{{ $employee->email }}</p>
        <div class="mt-4">
            <a href="{{ route('employee.edit', $employee->id) }}" class="text-blue-500 hover:underline mr-2">Modifier</a>
            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">Supprimer</button>
            </form>
        </div>
    </div>
</x-layout>
