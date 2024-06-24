<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama_produk', 'like', '%' . $searchTerm . '%');
        }

        $produk = $query->paginate(10);
        $kategori = Kategori::all();

        return view('admin.produk.index', [
            'produk' => $produk,
            'kategori' => $kategori,
        ]);
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

        // $produk = Produk::latest()->first();
        // $request['kode_produk'] = 'P' . tambah_nol_didepan((int)$produk->id, 6);
        $data = $request->all();

        Produk::create($data);

        return redirect('produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update($request->all());

        return redirect('produk')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);

        $produk->delete();

        return redirect('produk')->with('success', 'Produk berhasil dihapus');
    }
}
