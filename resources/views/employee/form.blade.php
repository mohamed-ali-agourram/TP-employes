<x-layout>
    @php
        $is_update = isset($employee);
    @endphp
    <form action="{{ $is_update ? route('employee.update', $employee->id) : route('employee.store') }}" method="post"
        class="bg-white p-4 rounded shadow-md" enctype="multipart/form-data">
        @csrf
        @if ($is_update)
            @method('PUT')
        @endif
        <div class="mb-4">
            <label for="nom" class="block text-gray-600 font-semibold">Nom</label>
            <input type="text" id="nom" name="nom" value="{{ $is_update ? $employee->nom : old('nom') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('nom')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="prenom" class="block text-gray-600 font-semibold">Prenom</label>
            <input type="text" id="prenom" name="prenom"
                value="{{ $is_update ? $employee->prenom : old('prenom') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('prenom')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-600 font-semibold">Email</label>
            <input type="email" id="email" name="email"
                value="{{ $is_update ? $employee->email : old('email') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-gray-600 font-semibold">Phone</label>
            <input type="number" id="phone" name="phone"
                value="{{ $is_update ? $employee->phone : old('phone') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('phone')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="section" class="block text-gray-600 font-semibold">Section</label>
            <input type="section" id="section" name="section"
                value="{{ $is_update ? $employee->section : old('section') }}"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('section')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-600 font-semibold">Image</label>
            <input type="file" id="image" name="image"
                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        @if ($is_update && $employee->image)
            <img src="{{ asset('storage/' . $employee->image) }}" width="200px" height="200px">
        @endif
        <button class="bg-[#333333f0] mt-3 text-white font-bold py-2 px-4 rounded">
            {{ $is_update ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
</x-layout>
