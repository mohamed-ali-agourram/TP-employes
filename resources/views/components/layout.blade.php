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
    <nav class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a class="text-lg font-semibold text-gray-800" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button
                    class="lg:hidden block text-gray-600 hover:text-gray-800 focus:outline-none focus:text-gray-800 transition duration-150 ease-in-out"
                    type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M0 3a3 3 0 013-3h14a3 3 0 110 6H3a3 3 0 01-3-3zM0 10a3 3 0 013-3h14a3 3 0 110 6H3a3 3 0 01-3-3zM0 17a3 3 0 013-3h14a3 3 0 110 6H3a3 3 0 01-3-3z" />
                    </svg>
                </button>
                <div class="hidden lg:flex lg:items-center justify-between lg:w-[100%] px-5"
                    id="navbarSupportedContent">
                    @auth
                        <ul class="flex space-x-4">
                            <!-- Dropdown for Employees -->
                            <li class="relative group">
                                <a class="text-gray-600 hover:text-gray-800" href="#" id="employeeDropdown">
                                    Employees
                                </a>
                                <ul
                                    class="hidden absolute left-0 bg-white border border-gray-300 rounded-lg shadow-lg group-hover:block">
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('employee.index') }}">Index</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('employee.create') }}">Create</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Dropdown for Projects -->
                            <li class="relative group">
                                <a class="text-gray-600 hover:text-gray-800" href="#" id="projectDropdown">
                                    Projects
                                </a>
                                <ul
                                    class="hidden absolute left-0 bg-white border border-gray-300 rounded-lg shadow-lg group-hover:block">
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('project.index') }}">Index</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('project.create') }}">Create</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Dropdown for Taches -->
                            <li class="relative group">
                                <a class="text-gray-600 hover:text-gray-800" href="#" id="tacheDropdown">
                                    Taches
                                </a>
                                <ul
                                    class="hidden absolute left-0 bg-white border border-gray-300 rounded-lg shadow-lg group-hover:block">
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('tache.index') }}">Index</a>
                                    </li>
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('tache.create') }}">Create</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="flex items-center space-x-4">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="relative group">
                                <a id="navbarDropdown" class="text-gray-600 hover:text-gray-800" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="hidden absolute left-0 bg-white border border-gray-300 rounded-lg shadow-lg group-hover:block"
                                    aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <main class="flex flex-col container mx-auto p-4">
        {{ $slot }}
    </main>
</body>

</html>
