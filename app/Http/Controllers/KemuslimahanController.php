<?php

namespace App\Http\Controllers;

use App\Models\Kemuslimahan;
use Illuminate\Http\Request;

class KemuslimahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kemu = Kemuslimahan::all();
        return view('admin.departement.kemuslimahan.index', compact('kemu'));
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
        $kemu = $request->all();
        $kemu['foto'] = $request->file('foto')->store('kemuslimahan', 'public');
        Kemuslimahan::create($kemu);
        return redirect('/admin/kemuslimahan')->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $kemu = $request->all();
        if (!empty($kemu['foto'])) {
            $kemu['foto'] = $request->file('foto')->store('kemuslimahan', 'public');
        } else {
            unset($data['foto']);
        }
        Kemuslimahan::findOrFail($id)->update($kemu);
        return redirect('/admin/kemuslimahan')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kemuslimahan::findOrFail($id)->delete();
        return  redirect('/admin/kemuslimahan')->with('success', 'Data berhasil dihapus.');
    }
}