<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama', 'like', '%' . $searchTerm . '%');
        }

        $supplier = $query->paginate(10);

        return view('admin.supplier.index', [
            'supplier' => $supplier,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'telepon.required' => 'Alamat harus diisi',
            'alamat.required' => 'Telepon harus diisi'
        ]);

        $data = $request->all();

        Supplier::create($data);

        return redirect('supplier')->with('success', 'Supplier berhasil ditambahkan');
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
        $supplier = Supplier::find($id);

        return view('admin.supplier.edit', [
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi'
        ]);

        $data = $request->all();

        Supplier::findOrFail($id)->update($data);

        return redirect('supplier')->with('success', 'Supplier berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);

        $supplier->delete();

        return redirect('supplier')->with('success', 'Supplier berhasil dihapus');
    }
}
