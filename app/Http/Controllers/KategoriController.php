<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $kategori = Kategori::paginate(5);
        return view('admin.kategori.index', ['kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
        ],[
            'nama_kategori.required' => 'Kategori harus diisi',
            'nama_kategori.unique' => 'Kategori sudah ada',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('kategori')->with('success', 'Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =  $request->all();

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        return redirect('kategori')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect('kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
