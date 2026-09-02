<?php

namespace App\Http\Controllers;

use App\Models\Bph;
use Illuminate\Http\Request;

class BphController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $bph = Bph::all();

    return view('admin.bph.index', compact('bph'));
}


    public function store(Request $request)
    {
        $bph = $request->all();
        $bph['foto'] = $request->file('foto')->store('bph', 'public');
        Bph::create($bph);
        return redirect('/admin/bph')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $bph = $request->all();
        if (!empty($bph['foto'])) {
            $bph['foto'] = $request->file('foto')->store('bph', 'public');
        } else {
            unset($bph['foto']);
        }
        Bph::findOrFail($id)->update($bph);
        return redirect('/admin/bph')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Bph::findOrFail($id)->delete();
        return  redirect('/admin/bph')->with('success', 'Data berhasil dihapus.');
    }
}