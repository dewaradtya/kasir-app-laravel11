@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">
        @if (session('success'))
            <div id="successModal"
                class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto outline-none focus:outline-none">
                <div class="relative w-auto max-w-sm mx-auto my-6">
                    <!--content-->
                    <div
                        class="relative flex flex-col w-full bg-white border-0 rounded-lg shadow-lg outline-none focus:outline-none">
                        <!--header-->
                        <div
                            class="flex items-start justify-between p-5 border-b border-solid rounded-t border-blueGray-200">
                            <h3 class="text-2xl font-semibold">
                                Success
                            </h3>
                            <button
                                class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                onclick="document.getElementById('successModal').style.display='none';">
                                <span
                                    class="bg-transparent text-black h-6 w-6 text-2xl block outline-none focus:outline-none">×</span>
                            </button>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <p class="text-lg leading-relaxed">
                                {{ session('success') }}
                            </p>
                        </div>
                        <!--footer-->
                        <div class="flex items-center justify-end p-6 border-t border-solid rounded-b border-blueGray-200">
                            <button
                                class="text-black background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1"
                                onclick="document.getElementById('successModal').style.display='none';">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById('successModal').style.display = 'block';
            </script>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="card shadow-lg bg-white rounded-lg p-4 mt-4">
                <h2 class="text-xl font-semibold mb-4">Kategori</h2>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse">
                        <thead>
                            <tr class="text-white bg-gradient-to-l from-blue-900 via-blue-600 to-blue-500">
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Nama Kategori</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $row)
                                <tr>
                                    <td class="px-2 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-2">{{ $row->nama }}</td>
                                    <td class="px-2 py-2">{{ $row->slug }}</td>
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
                        <label for="nama" class="block text-sm font-semibold text-gray-600 mb-2">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="w-full border rounded-md py-2 px-3"
                            placeholder="Nama Kategori">
                        @error('nama')
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
