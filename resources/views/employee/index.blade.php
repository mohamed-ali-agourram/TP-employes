<x-layout>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th scope="col" class="py-2 px-4 text-center">Nom</th>
                <th scope="col" class="py-2 px-4 text-center">Prénom</th>
                <th scope="col" class="py-2 px-4 text-center">Email</th>
                <th scope="col" class="py-2 px-4 text-center">Phone</th>
                <th scope="col" class="py-2 px-4 text-center">Section</th>
                <th scope="col" class="py-2 px-4 text-center">Image</th>
                <th scope="col" class="py-2 px-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr class="hover:bg-gray-200">
                    <td class="py-2 px-4 text-center">{{ $employee->nom }}</td>
                    <td class="py-2 px-4 text-center">{{ $employee->prenom }}</td>
                    <td class="py-2 px-4 text-center">{{ $employee->email }}</td>
                    <td class="py-2 px-4 text-center">{{ $employee->phone }}</td>
                    <td class="py-2 px-4 text-center text-red-500">{{ $employee->section }}</td>
                    <td class="py-2 px-4 text-center">
                        <img src="{{ asset('storage/' . $employee->image) }}" width="80px" height="80px">
                    </td>
                    <td class="py-2 px-4 text-center flex justify-center items-center gap-2">
                        <a href="{{ route('employee.show', $employee->id) }}"
                            class="text-blue-500 hover:underline">Show</a>
                        <a href="{{ route('employee.edit', $employee->id) }}"
                            class="text-green-500 hover:underline">Modifier</a>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $employees->links() }}
    </div>
    <a href="{{ route('employee.create') }}"
        class="mt-4 bg-[#333333f0] text-white font-bold w-fit p-2 rounded-sm">Ajouter</a>
</x-layout>
