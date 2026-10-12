<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Bph;
use App\Models\Kemuslimahan;
use App\Models\Kominfo;
use App\Models\kwu;
use App\Models\psdm;
use App\Models\Rapat;
use App\Models\Syiar;
use App\Models\MinatBakat;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Blog::latest()->get(); // Get all articles for the artikels section
        $rapats = Rapat::latest()->paginate(3);
        $bph = Bph::all();
        $bphAkhir = collect();
        $data = Blog::latest()->paginate(3); // Keep this if needed elsewhere, though not used in view

        return view('userGuest.index', compact('artikel', 'rapats', 'bph', 'bphAkhir', 'data'));
    }

    /**
     * Halaman struktur pengurus (BPH + departemen).
     */
    public function detail_anggota()
    {
        $bph = Bph::all();
        $kominfo = Kominfo::where('angkatan', '2024')->get();
        $syiar = Syiar::where('angkatan', '2024')->get();
        $kemuslimahan = Kemuslimahan::where('angkatan', '2024')->get();
        $psdm = psdm::where('angkatan', '2024')->get();
        $kwu = kwu::where('angkatan', '2024')->get();
        $minatbakat = MinatBakat::all();

        return view('userGuest.detail_pengurus', compact(
            'bph', 'kominfo', 'syiar', 'kemuslimahan', 'psdm', 'kwu', 'minatbakat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}