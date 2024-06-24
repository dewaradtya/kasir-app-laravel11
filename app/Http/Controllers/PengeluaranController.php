<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pengeluaran::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('deskripsi', 'like', '%' . $searchTerm . '%');
        }

        $pengeluaran = $query->paginate(10);

        return view('admin.pengeluaran.index', [
            'pengeluaran' => $pengeluaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nominal' => 'required',
        ], [
            'deskripsi.required' => 'deskripsi harus diisi',
            'nominal.required' => 'Nominal harus diisi',
        ]);

        $data = $request->all();

        Pengeluaran::create($data);

        return redirect('pengeluaran')->with('success', 'pengeluaran berhasil ditambahkan');
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
        $pengeluaran = Pengeluaran::find($id);

        return view('admin.pengeluaran.edit', [
            'pengeluaran' => $pengeluaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'nominal' => 'required',
        ], [
            'deskripsi.required' => 'deskripsi harus diisi',
            'nominal.required' => 'Nominal harus diisi',
        ]);

        $data = $request->all();

        Pengeluaran::findOrFail($id)->update($data);

        return redirect('pengeluaran')->with('success', 'Pengeluaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengeluaran = Pengeluaran::find($id);

        $pengeluaran->delete();

        return redirect('pengeluaran')->with('success', 'Pengeluaran berhasil dihapus');
    }
}
