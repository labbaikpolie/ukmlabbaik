<?php

namespace App\Http\Controllers;

use App\Models\Kominfo;
use Illuminate\Http\Request;

class KominfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kominfo = Kominfo::all();
        return view('admin.departement.kominfo.index', compact('kominfo'));
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
        $kominfo = $request->all();
        $kominfo['foto'] = $request->file('foto')->store('kominfo', 'public');
        Kominfo::create($kominfo);
        return redirect('/admin/kominfo')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kominfo $kominfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kominfo $kominfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kominfo = $request->all();
        if (!empty($kominfo['foto'])) {
            $kominfo['foto'] = $request->file('foto')->store('kominfo', 'public');
        } else {
            unset($kominfo['foto']);
        }
        Kominfo::findOrFail($id)->update($kominfo);
        return redirect('/admin/kominfo')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kominfo::findOrFail($id)->delete();
        return  redirect('/admin/kominfo')->with('success', 'Data berhasil dihapus.');
    }
}