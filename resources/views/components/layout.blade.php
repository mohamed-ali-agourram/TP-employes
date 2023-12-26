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
        <h1 class="text-3xl font-bold">Employees</h1>
        <div class="flex gap-3">
            <a class="block mt-4 hover:underline" href="{{ route('employee.index') }}">Employes</a>
            <a class="block mt-4 hover:underline" href="{{ route('project.index') }}">Projets</a>
        </div>
    </header>

    <main class="flex flex-col container mx-auto p-4">
        {{ $slot }}
    </main>
</body>

</html>
