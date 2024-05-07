<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::paginate(10);
        return view('admin.member.index', [
            'member' => $member
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_member' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'kode_member.required' => 'Kode member harus diisi',
            'telepon.required' => 'Alamat harus diisi',
            'alamat.required' => 'Telepon harus diisi'
        ]);

        $data = $request->all();

        Member::create($data);

        return redirect('member')->with('success', 'Member berhasil ditambahkan');
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
        $member = Member::find($id);

        return view('admin.member.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode_member' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'kode_member.required' => 'Kode member harus diisi',
            'telepon.required' => 'Telepon harus diisi',
            'alamat.required' => 'Alamat harus diisi'
        ]);

        $data = $request->all();

        Member::findOrFail($id)->update($data);

        return redirect('member')->with('success', 'Member berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);

        $member->delete();

        return redirect('member')->with('success', 'Member berhasil dihapus');
    }
}
