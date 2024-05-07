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
            'nama_produk' => 'required|min:2',
            'diskon' => 'required',
            'harga_jual' => 'required|numeric|min:0',
            'harga_beli' => 'required|numeric|min:0',
        ], [
            'nama_produk.required' => 'nama_produk produk harus diisi.',
            'nama_produk.min' => 'nama_produk produk minimal harus memiliki :min karakter.',
            'harga_jual.required' => 'Harga produk harus diisi.',
            'harga_jual.numeric' => 'Harga produk harus berupa angka.',
            'harga_jual.min' => 'Harga produk tidak boleh kurang dari :min.',
            'harga_beli.required' => 'Harga produk harus diisi.',
            'harga_beli.numeric' => 'Harga produk harus berupa angka.',
            'harga_beli.min' => 'Harga produk tidak boleh kurang dari :min.',
        ]);

        $data = $request->all();

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
