<?php

namespace App\Http\Controllers\admin;

use App\Models\Rapat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class rapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapats = Rapat::all();
        return view('admin.rapat.index', compact('rapats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('rapat', 'public');
        Rapat::create($data);
        return redirect('/admin/rapat')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rapat $rapat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rapat $rapat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!empty($data['foto'])) {
            $data['foto'] = $request->file('foto')->store('rapat', 'public');
        } else {
            unset($data['foto']);
        }
        Rapat::findOrFail($id)->update($data);
        return redirect('/admin/rapat')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rapat::findOrFail($id)->delete();
        return  redirect('/admin/rapat')->with('success', 'Data berhasil dihapus.');
    }

    // public function rapat()
    // {
    //     $rapats = Rapat::latest()->paginate(3);
    //     // dd($data);
    //     return view('userGuest.index', ['rapat' => $rapats]);
    // }
}