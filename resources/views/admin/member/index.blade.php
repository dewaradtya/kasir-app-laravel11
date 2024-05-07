@extends('layouts.sidebar')

@section('content')
    <div class="flex-1">

        <div class="card shadow-lg bg-white rounded-lg p-4 mt-4">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold mb-4">Data Member</h2>
                <div class="flex space-x-4">
                    <div class="relative">
                        <input type="text"
                            class="border px-2 py-1 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <a href="{{ route('member.create') }}"
                        class="inline-block px-4 py-2 bg-green-700 text-white rounded-md shadow-sm hover:bg-green-600">Add
                        Data</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse">
                    <thead>
                        <tr class="text-white bg-yellow-900 bg-opacity-80">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nama Member</th>
                            <th class="px-4 py-2">Kode Member</th>
                            <th class="px-4 py-2">Alamat</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $row)
                            <tr>
                                <td class="px-2 py-2">{{ $loop->iteration }}</td>
                                <td class="px-2 py-2">{{ $row->nama }}</td>
                                <td class="px-2 py-2">{{ $row->kode_member }}</td>
                                <td class="px-2 py-2">{{ $row->alamat }}</td>
                                <td class="px-2 py-2">{{ $row->telepon }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('member.edit', $row->id) }}"
                                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">Edit</a>
                                    <form action="{{ route('member.destroy', $row->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus member ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan {{ $member->lastItem() }} dari {{ $member->total() }} item
                        </p>
                    </div>
                    <div class="relative">
                        <select onchange="window.location.href = this.value"
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @foreach ($member->getUrlRange(1, $member->lastPage()) as $perPage => $url)
                                <option value="{{ request()->fullUrlWithQuery(['perPage' => $perPage]) }}"
                                    {{ $member->perPage() == $perPage ? 'selected' : '' }}>
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
