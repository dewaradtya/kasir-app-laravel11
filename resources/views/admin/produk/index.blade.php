@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">

        <div class="card shadow-lg bg-white rounded-lg p-4 mt-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold mb-4">Produk</h2>
                <div class="flex space-x-4">
                    <div class="relative">
                        <form action="{{ route('produk.index') }}" method="GET">
                            <input type="text" name="search"
                                class="border px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button type="submit" class="inline-block px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600">Search</button>
                        </form>
                    </div>
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('kategori.index') }}"
                            class="inline-block px-4 py-2 bg-gray-700 text-white rounded-md shadow-sm hover:bg-gray-600">Kategori</a>
                    @endif
                    <a href="{{ route('produk.create') }}"
                        class="inline-block px-4 py-2 bg-green-700 text-white rounded-md shadow-sm hover:bg-green-600">Add
                        Data</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="text-white bg-yellow-900 bg-opacity-80">
                            <th>
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Kode Produk</th>
                            <th class="px-4 py-2">Nama Produk</th>
                            <th class="px-4 py-2">Harga Jual</th>
                            <th class="px-4 py-2">Harga Beli</th>
                            <th class="px-4 py-2">Stok</th>
                            <th class="px-4 py-2">Diskon</th>
                            <th class="px-4 py-2">Kategori</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $row)
                            <tr>
                                <td class="px-2 py-2"><input type="checkbox" name="select_all" id="select_all"></td>
                                <td class="px-2 py-2">{{ $loop->iteration }}</td>
                                <td class="px-2 py-2">{{ $row->kode_produk }}</td>
                                <td class="px-2 py-2">{{ $row->nama_produk }}</td>
                                <td class="px-2 py-2">Rp.
                                    {{ format_uang($row->harga_jual) }}</td>
                                <td class="px-2 py-2">Rp.
                                    {{ format_uang($row->harga_beli) }}</td>
                                <td class="px-2 py-2">{{ format_uang($row->stok) }}</td>
                                <td class="px-2 py-2">{{ $row->diskon }}</td>
                                <td class="px-2 py-2">{{ $row->kategori->nama_kategori }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('produk.edit', $row->id) }}"
                                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">Edit</a>
                                    <form action="{{ route('produk.destroy', $row->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan {{ $produk->lastItem() }} dari {{ $produk->total() }} item
                        </p>
                    </div>
                    <div class="relative">
                        <select onchange="window.location.href = this.value"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $perPage => $url)
                                <option value="{{ request()->fullUrlWithQuery(['perPage' => $perPage]) }}"
                                    {{ $produk->perPage() == $perPage ? 'selected' : '' }}>
                                    {{ $perPage }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
