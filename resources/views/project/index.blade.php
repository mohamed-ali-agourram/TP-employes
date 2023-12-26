<x-layout>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th scope="col" class="py-2 px-4 text-center">Titre</th>
                <th scope="col" class="py-2 px-4 text-center">Date</th>
                <th scope="col" class="py-2 px-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="hover:bg-gray-200">
                    <td class="py-2 px-4 text-center">{{ $project->titre }}</td>
                    <td class="py-2 px-4 text-center">{{ $project->created_at }}</td>
                    <td class="py-2 px-4 text-center flex justify-center items-center gap-2">
                        <a href="{{ route('project.show', $project->id) }}"
                            class="text-blue-500 hover:underline">Show</a>
                        <a href="{{ route('project.edit', $project->id) }}"
                            class="text-green-500 hover:underline">Modifier</a>
                        <form action="{{ route('project.destroy', $project->id) }}" method="POST">
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
        {{ $projects->links() }}
    </div>
    <a href="{{ route('project.create') }}"
        class="mt-4 bg-[#333333f0] text-white font-bold w-fit p-2 rounded-sm">Ajouter</a>
</x-layout>
