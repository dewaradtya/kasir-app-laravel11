<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 280px;
            transition: all 0.3s ease-in-out;
            background-color: #005344;
        }

        .sidebar:hover {
            width: 300px;
        }

        .sidebar-content {
            padding: 20px;
            color: #f3f4f6;
        }

        .hamburger {
            cursor: pointer;
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 3px;
            background-color: #b4b4b4;
            margin: 5px 0;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white shadow-md sidebar">
            <!-- Konten sidebar -->
            <div class="sidebar-content">
                <h1 class="text-xl font-bold mb-4 ml-7">Kasir App</h1>
                <ul>
                    <div class="bg-white bg-opacity-25 shadow-md rounded-lg p-2">
                        <a href="{{ route('dashboard') }}" class="block py-2">Dashboard</a>
                    </div>
                    <p class="py-2 mx-4 font-semibold text-sm">COMPONENTS</p>
                    <li><a href="{{ route('produk.index') }}" class="block py-2">Produk</a></li>
                    <li><a href="#" class="block py-2">Penjualan</a></li>
                </ul>
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="block w-full py-2 mt-4 text-sm font-medium text-center bg-red-600 rounded-md hover:bg-red-700">Logout</button>
                </form>
            </div>
        </aside>
        
        <!-- Konten Utama -->
        <main class="flex-1 p-8">
            <div class="bg-green-900 bg-opacity-60 shadow-md rounded-lg p-4 text-white">
                <p class="ml-4" id="greeting"></p>
                <h1 class="text-xl font-semibold ml-4">Hi, {{ auth()->user()->name }}</h1>
            </div>

            @yield('content')
        </main>
    </div>
    <!-- Tombol hamburger -->
    <div class="fixed top-5 left-5 z-50 hamburger" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Script untuk toggle sidebar -->
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
        var time = new Date().getHours(); // Dapatkan jam saat ini

        var greeting = document.getElementById('greeting');

        if (time >= 5 && time < 12) {
            greeting.textContent = 'Selamat pagi';
        } else if (time >= 12 && time < 15) {
            greeting.textContent = 'Selamat siang';
        } else if (time >= 15 && time < 18) {
            greeting.textContent = 'Selamat sore';
        } else if (time >= 18 && time < 24) {
            greeting.textContent = 'Selamat malam';
        } else {
            greeting.textContent = 'Selamat malam';
        }
    });
    </script>

</body>

</html>
