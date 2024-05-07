@extends('layouts.sidebar')

@section('content')
    <div class="flex-1"> 
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="card shadow-lg bg-white rounded-lg p-4 mt-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold mb-4">Kategori</h2>
                    <div class="flex space-x-4">
                        <div class="relative">
                            <input type="text"
                                class="border px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <a href="{{ route('produk.index') }}"
                            class="inline-block px-4 py-2 bg-yellow-700 text-white rounded-md shadow-sm hover:bg-yellow-600">Kembali</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="text-white bg-gradient-to-l from-blue-900 via-blue-600 to-blue-500">
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Nama Kategori</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $row)
                                <tr>
                                    <td class="px-2 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-2">{{ $row->nama_kategori }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('kategori.edit', $row->id) }}"
                                            class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">Edit</a>
                                        <form action="{{ route('kategori.destroy', $row->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan {{ $kategori->lastItem() }} dari {{ $kategori->total() }} item
                            </p>
                        </div>
                        <div class="relative">
                            <select onchange="window.location.href = this.value"
                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($kategori->getUrlRange(1, $kategori->lastPage()) as $perPage => $url)
                                    <option value="{{ request()->fullUrlWithQuery(['perPage' => $perPage]) }}"
                                        {{ $kategori->perPage() == $perPage ? 'selected' : '' }}>
                                        {{ $perPage }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-lg bg-white rounded-lg p-4 mt-4">
                <h2 class="text-xl font-semibold mb-4">Buat Kategori Baru</h2>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-semibold text-gray-600 mb-2">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="w-full border rounded-md py-2 px-3"
                            placeholder="Nama Kategori">
                        @error('nama_kategori')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded-md shadow-sm hover:bg-green-600">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
