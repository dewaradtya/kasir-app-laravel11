<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Styling untuk navbar */
        .navbar {
            background-color: rgb(0, 0, 0); 
            backdrop-filter: blur(10px); 
            opacity: 80%;
        }
    </style>
</head>
<body class="bg-gray-100 py-12">
    <nav class="navbar fixed top-0 left-0 w-full bg-transparent backdrop-blur-lg p-4 rounded-lg">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div>
                    <a href="#" class="text-white text-2xl font-bold">Kasir App</a>
                </div>
                <!-- Menu -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{route('dashboard')}}" class="text-white hover:text-gray-200">Dashboard</a>
                    <a href="#" class="text-white hover:text-gray-200">About</a>
                    <a href="#" class="text-white hover:text-gray-200">Services</a>
                    <a href="#" class="text-white hover:text-gray-200">Contact</a>
                </div>
                <!-- Mobile Menu Button (Hamburger) -->
                <div class="md:hidden">
                    <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden">
            <div class="px-2 py-3">
                <a href="{{route('dashboard')}}" class="block text-white hover:text-gray-200 py-2">Dashboard</a>
                <a href="#" class="block text-white hover:text-gray-200 py-2">About</a>
                <a href="#" class="block text-white hover:text-gray-200 py-2">Services</a>
                <a href="#" class="block text-white hover:text-gray-200 py-2">Contact</a>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        // Toggle mobile menu visibility
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
