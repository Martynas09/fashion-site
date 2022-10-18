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
</nav>
<div class="flex justify-center mt-28">
    @yield('content')
</div>
</body>
</html>
