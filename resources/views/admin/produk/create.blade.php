@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        <div class="card shadow-lg bg-yellow-200 rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Produk</h2>

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Produk:</label>
                    <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('jumlah')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">File Gambar Produk:</label>
                    <input type="file" id="file" name="file" accept="image/*" required
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('file')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategory</label>
                    <select name="kategori_id" id="kategori_id" class="w-full border rounded-md py-2 px-3">
                        @foreach ($kategori as $row)
                            <option value="{{ $row->id }}">{{ $row->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="is_active" class="block text-sm font-medium text-gray-700">Kategory</label>
                    <select name="is_active" id="is_active" class="w-full border rounded-md py-2 px-3">
                            <option value="1">Publish</option>
                            <option value="0">Draft</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required min="0"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('harga')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                    <textarea id="description" name="description" required
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">Simpan</button>
            </form>
        </div>
    </div>
@endsection
