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

</head>
<body>
<nav class="flex justify-around py-4 bg-white/80 backdrop-blur-md shadow-md w-full fixed top-0 left-0 right-0 z-10">
    <!-- Logo Container -->
    <div class="flex items-center">
        <!-- Logo -->
        <a class="cursor-pointer">
            <h3 class="text-2xl font-medium text-blue-500">
                <img class="h-10 object-cover"
                     src="https://stackoverflow.design/assets/img/logos/so/logo-stackoverflow.svg">
            </h3>
        </a>
    </div>
    <!-- Links Section -->
    <div class="items-center hidden space-x-8 lg:flex">
        <a class="flex text-gray-600 hover:text-black
                    cursor-pointer transition-colors duration-300">
            Pagrindinis
        </a>

        <a class="flex text-gray-600 hover:text-black
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
</nav>
<div class="flex flex-col items-center mt-24">
    @yield('content')
</div>
</body>
</html>
