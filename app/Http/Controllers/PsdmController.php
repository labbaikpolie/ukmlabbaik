<?php

namespace App\Http\Controllers;

use App\Models\psdm;
use Illuminate\Http\Request;

class PsdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psdm = psdm::all();
        return view('admin.departement.psdm.index', compact('psdm'));
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
        $psdm = $request->all();
        $psdm['foto'] = $request->file('foto')->store('psdm', 'public');
        psdm::create($psdm);
        return redirect('/admin/psdm')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $psdm = $request->all();
        if (!empty($psdm['foto'])) {
            $psdm['foto'] = $request->file('foto')->store('psdm', 'public');
        } else {
            unset($psdm['foto']);
        }
        psdm::findOrFail($id)->update($psdm);
        return redirect('/admin/psdm')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        psdm::findOrFail($id)->delete();
        return  redirect('/admin/psdm')->with('success', 'Data berhasil dihapus.');
    }
}