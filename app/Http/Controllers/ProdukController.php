<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::paginate(10);
        return view('admin.produk.index', ['produk' => $produk]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'file' => 'required|image',
            'description' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ], [
            'title.required' => 'title produk harus diisi.',
            'title.min' => 'title produk minimal harus memiliki :min karakter.',
            'description.required' => 'title produk harus diisi.',
            'file.required' => 'File gambar produk harus diunggah.',
            'file.image' => 'File yang diunggah harus berupa gambar.',
            'harga.required' => 'Harga produk harus diisi.',
            'harga.numeric' => 'Harga produk harus berupa angka.',
            'harga.min' => 'Harga produk tidak boleh kurang dari :min.',
        ]);

        $data = $request->all();
        $data['views'] = 0;
        $gambar = $request->file('file')->storeAs('produk', $request->file('file')->getClientOriginalName());

        $data['file'] = $gambar;

        Produk::create($data);

        return redirect('produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        $produk->delete();

        return redirect('produk')->with('success', 'Produk berhasil dihapus');
    }
}
