@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        
        <div class="card shadow-lg bg-yellow-500 bg-opacity-25 rounded-lg p-4 mt-4">
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="text-white bg-black bg-opacity-50">
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Usia</th>
                            <th class="px-4 py-2">Kota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="transition-colors duration-300 ease-in-out hover:bg-yellow-100">
                            <td class="border px-4 py-2">John Doe</td>
                            <td class="border px-4 py-2">30</td>
                            <td class="border px-4 py-2">Jakarta</td>
                        </tr>
                        <tr class="transition-colors duration-300 ease-in-out hover:bg-yellow-100">
                            <td class="border px-4 py-2">Jane Smith</td>
                            <td class="border px-4 py-2">25</td>
                            <td class="border px-4 py-2">Bandung</td>
                        </tr>
                        <tr class="transition-colors duration-300 ease-in-out hover:bg-yellow-100">
                            <td class="border px-4 py-2">Michael Johnson</td>
                            <td class="border px-4 py-2">35</td>
                            <td class="border px-4 py-2">Surabaya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection