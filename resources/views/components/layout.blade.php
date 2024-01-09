<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Models</title>
</head>
<style>
    body {
        min-height: 100dvh
    }
</style>

<body class="bg-white">
    <header class="bg-[#333333f0] text-white p-4">
        <h1 class="text-3xl font-bold"><a href="/">Home</a></h1>
        <div class="flex justify-between items-center mt-4">
            <div class="flex gap-3">
                <a class="block hover:underline" href="{{ route('employee.index') }}">Employes</a>
                <a class="block hover:underline" href="{{ route('project.index') }}">Projets</a>
                <a class="block hover:underline" href="{{ route('tache.index') }}">Taches</a>
            </div>
            <form action="{{ route('logout') }}" method="post" class="h-full">
                @csrf
                <button class="hover:underline">logout</button>
            </form>
        </div>
    </header>

    <main class="flex flex-col container mx-auto p-4">
        {{ $slot }}
    </main>
</body>

</html>
