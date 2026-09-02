<?php

namespace App\Http\Controllers;

use App\Models\Syiar;
use Illuminate\Http\Request;

class SyiarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $syiar = Syiar::all();
        return view('admin.departement.syiar.index', compact('syiar'));
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
        $syiar = $request->all();
        $syiar['foto'] = $request->file('foto')->store('syiar', 'public');
        Syiar::create($syiar);
        return redirect('/admin/syiar')->with('success', 'Data berhasil ditambahkan.');
    }


    public function update(Request $request, $id)
    {
        $syiar = $request->all();
        if (!empty($syiar['foto'])) {
            $syiar['foto'] = $request->file('foto')->store('syiar', 'public');
        } else {
            unset($syiar['foto']);
        }
        Syiar::findOrFail($id)->update($syiar);
        return redirect('/admin/syiar')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Syiar::findOrFail($id)->delete();
        return  redirect('/admin/syiar')->with('success', 'Data berhasil dihapus.');
    }
}