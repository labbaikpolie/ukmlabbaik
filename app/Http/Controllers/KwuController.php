<?php

namespace App\Http\Controllers;

use App\Models\kwu;
use Illuminate\Http\Request;

class KwuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kwu = kwu::all();
        return view('admin.departement.kwu.index', compact('kwu'));
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
        $kwu = $request->all();
        $kwu['foto'] = $request->file('foto')->store('kwu', 'public');
        kwu::create($kwu);
        return redirect('/admin/kwu')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kwu = $request->all();
        if (!empty($kwu['foto'])) {
            $kwu['foto'] = $request->file('foto')->store('kwu', 'public');
        } else {
            unset($kwu['foto']);
        }
        kwu::findOrFail($id)->update($kwu);
        return redirect('/admin/kwu')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        kwu::findOrFail($id)->delete();
        return  redirect('/admin/kwu')->with('success', 'Data berhasil dihapus.');;
    }
}