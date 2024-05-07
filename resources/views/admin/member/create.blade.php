@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        <div class="card shadow-lg bg-yellow-200 rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Member</h2>

            <form action="{{ route('member.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Member:</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('nama')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="kode_member" class="block text-sm font-medium text-gray-700">Kode Member:</label>
                    <input type="text" id="kode_member" name="kode_member" value="{{ old('kode_member') }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('kode_member')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon Member</label>
                    <input type="text" id="telepon" name="telepon" value="{{ old('telepon') }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('telepon')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Member</label>
                    <textarea type="text" id="alamat" name="alamat"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">Simpan</button>
            </form>
        </div>
    </div>
@endsection
