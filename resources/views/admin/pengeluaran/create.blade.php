@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        <div class="card shadow-lg bg-yellow-200 rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Pengeluaran</h2>

            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi pengeluaran:</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('deskripsi')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal:</label>
                    <input type="text" id="nominal" name="nominal" value="{{ old('nominal') }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('nominal')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">Simpan</button>
                    <a href="{{ route('pengeluaran.index') }}"
                        class="bg-red-600 text-white hover:bg-red-800 rounded-md px-3 py-2">Kembali</a>
            </form>
        </div>
    </div>
@endsection
