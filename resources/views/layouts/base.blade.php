<!doctype html>
<html lang="LT">
<head>
    <title>Tavo Kodas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        *::-webkit-scrollbar {
            width: 20px;
            height: 20px;
        }

        *::-webkit-scrollbar-track {
            border-radius: 100vh;
            background: #f7f4ed;
        }

        *::-webkit-scrollbar-thumb {
            background: #d3d3d3;
            border-radius: 100vh;
            border: 3px solid #f6f7ed;
        }

        *::-webkit-scrollbar-thumb:hover {
            background: #656364;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
</head>
<body>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<nav class="flex justify-around py-4 bg-white/80 backdrop-blur-md shadow-md w-full fixed top-0 left-0 right-0 z-10">
    <!-- Logo Container -->
    <div class="flex items-center">
        <!-- Logo -->
        <a href="/" class="cursor-pointer">
            <img class="h-12 object-cover"
                 src="/logo.png">
            </h3>
        </a>
    </div>
    <!-- Links Section -->
    <div class="items-center hidden space-x-8 lg:flex">
        <a href="/" class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Pagrindinis
        </a>

        <a href="/services" class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Paslaugos
        </a>

        <a class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Grupinės veiklos
        </a>

        <a class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Įrašai
        </a>

        <a class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Apie
        </a>
    </div>
    <div class="md:hidden">
        <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-gray-600 hover:bg-gray-200 focus:outline-none font-medium text-sm px-4 py-2.5 text-center inline-flex items-center" type="button"><svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-20 w-[1000px] bg-white shadow-md rounded divide-y divide-gray-100 shadow dark:bg-gray-700" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 310px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom">
            <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                <li>
                    <a href="/" class="block py-2 px-4 hover:bg-gray-100">Pagrindinis</a>
                </li>
                <li>
                    <a href="/services" class="block py-2 px-4 hover:bg-gray-100">Paslaugos</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 ">Grupinės veiklos</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100">Įrašai</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100">Apie</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="flex justify-center mt-24">
    @yield('content')
</div>
<div>
    <a class="lg:absolute left-0 bottom-0 mt-4 pl-2 text-sm text-gray-500 dark:text-white">© TAVO KODAS 2022</a>
</div>
</body>
</html>

