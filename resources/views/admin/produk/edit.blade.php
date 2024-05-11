@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        <div class="card shadow-lg bg-yellow-200 rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold mb-4">Edit Produk</h2>

            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('nama_produk')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="merk" class="block text-sm font-medium text-gray-700">Merk Produk:</label>
                    <input type="text" id="merk" name="merk" value="{{ $produk->merk }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('merk')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok Produk:</label>
                    <input type="number" id="stok" name="stok" value="{{ $produk->stok }}"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('stok')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategory</label>
                    <select name="kategori_id" id="kategori_id" class="w-full border rounded-md py-2 px-3">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $produk->kategori_id ? 'selected' : '' }}>
                                {{ $row->nama_kategori }}
                            </option>
                        @endforeach
                    </select>                    
                </div>
                <div class="mb-4">
                    <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual:</label>
                    <input type="number" id="harga_jual" name="harga_jual" value="{{ $produk->harga_jual }}" min="0"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('harga_jual')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="harga_beli" class="block text-sm font-medium text-gray-700">Harga Beli:</label>
                    <input type="number" id="harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}" min="0"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('harga_beli')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="diskon" class="block text-sm font-medium text-gray-700">Diskon:</label>
                    <input type="number" id="diskon" name="diskon" value="{{ $produk->diskon }}" min="0"
                        class="mt-1 p-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('diskon')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm hover:bg-green-700">Simpan</button>
            </form>
        </div>
    </div>
@endsection
