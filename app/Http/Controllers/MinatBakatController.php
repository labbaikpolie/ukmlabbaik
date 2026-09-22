<?php

namespace App\Http\Controllers;

use App\Models\MinatBakat;
use Illuminate\Http\Request;

class MinatBakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minatbakat = MinatBakat::all();
        return view('admin.departement.minatbakat.index', compact('minatbakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'departement' => 'nullable|string',
            'foto' => 'nullable|image|max:2048', // 2MB
            'moto' => 'nullable|string',
            'angkatan' => 'nullable|string',
            'prodi' => 'nullable|string',
        ]);

        $minatbakat = new MinatBakat();
        $minatbakat->nama = $request->nama;
        $minatbakat->tanggal_lahir = $request->tanggal_lahir;
        $minatbakat->departement = $request->departement;
        $minatbakat->moto = $request->moto;
        $minatbakat->angkatan = $request->angkatan;
        $minatbakat->prodi = $request->prodi;

        if ($request->hasFile('foto')) {
            $minatbakat->foto = $request->file('foto')->store('minatbakat', 'public');
        }

        $minatbakat->save();

        return redirect('/admin/minatbakat')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'departement' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
            'moto' => 'nullable|string',
            'angkatan' => 'nullable|string',
            'prodi' => 'nullable|string',
        ]);

        $minatbakat = MinatBakat::findOrFail($id);
        $minatbakat->nama = $request->nama;
        $minatbakat->tanggal_lahir = $request->tanggal_lahir;
        $minatbakat->departement = $request->departement;
        $minatbakat->moto = $request->moto;
        $minatbakat->angkatan = $request->angkatan;
        $minatbakat->prodi = $request->prodi;

        if ($request->hasFile('foto')) {
            $minatbakat->foto = $request->file('foto')->store('minatbakat', 'public');
        }

        $minatbakat->save();

        return redirect('/admin/minatbakat')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MinatBakat::findOrFail($id)->delete();
        return redirect('/admin/minatbakat')->with('success', 'Data berhasil dihapus.');
    }
}