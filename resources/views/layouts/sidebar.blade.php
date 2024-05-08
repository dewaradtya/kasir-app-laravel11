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

        /* Styles for sidebar links */
        .sidebar-link {
            transition: background-color 0.3s;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .active-sidebar-link {
            background-color: rgba(255, 255, 255, 0.2);
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
                    <li><a href="{{ route('produk.index') }}" class="block py-2 sidebar-link">Produk</a></li>
                    <li><a href="{{ route('member.index') }}" class="block py-2 sidebar-link">Member</a></li>
                    <li><a href="{{ route('supplier.index') }}" class="block py-2 sidebar-link">Supplier</a></li>
                    <p class="py-2 mx-4 font-semibold text-sm">TRANSACTION</p>
                    <li><a href="{{ route('pengeluaran.index') }}" class="block py-2 sidebar-link">Pengeluaran</a></li>
                    <li><a href="#" class="block py-2 sidebar-link">Penjualan</a></li>
                    <li><a href="{{ route('pembelian.index') }}" class="block py-2 sidebar-link">Pembelian</a></li>
                    <p class="py-2 mx-4 font-semibold text-sm">CONTROLLER</p>
                    <li><a href="{{ route('setting.index') }}" class="block py-2 sidebar-link">Setting</a></li>
                </ul>
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit"
                        class="block w-full py-2 mt-4 text-sm font-medium text-center bg-red-600 rounded-md hover:bg-red-700">Logout</button>
                </form>
            </div>
        </aside>

        @if (session('success'))
            <div id="successModal"
                class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
                <div class="relative w-auto max-w-sm mx-auto my-6">
                    <div
                        class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                        <div
                            class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                            <h3 class="text-2xl font-semibold text-gray-800">Berhasil</h3>
                            <button
                                class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                onclick="document.getElementById('successModal').style.display='none';">
                                <span
                                    class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">×</span>
                            </button>
                        </div>
                        <div class="relative p-6 flex-auto">
                            <p class="text-lg leading-relaxed text-gray-700">{{ session('success') }}</p>
                        </div>
                        <div
                            class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                            <button
                                class="text-white bg-green-500 hover:bg-green-600 font-bold uppercase px-6 py-2 text-sm rounded shadow outline-none focus:outline-none mr-1 mb-1"
                                onclick="document.getElementById('successModal').style.display='none';">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('successModal').style.display = 'block';
            </script>
        @endif

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
