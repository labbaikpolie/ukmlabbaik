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
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::latest()->paginate(3);
        $rapats = Rapat::latest()->paginate(3);
        // dd($data);
        $bph = Bph::all(); 
        $bphAkhir = collect();
    
        return view('userGuest.index', compact('bph', 'bphAkhir')); // pastikan nama view sesuai

        $artikel = Blog::latest()->get();
        return view('userGuest.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail_anggota()
    {
        // $rapats = Rapat::latest()->paginate(3);
        // dd($rapats);
        $kominfo = Kominfo::where('angkatan', '2024')->get();
        $syiar = Syiar::where('angkatan', '2024')->paginate(2);
        $syiarr = Syiar::where('id', 4)->where('angkatan', '2024')->get();
        $kemuslimahan = Kemuslimahan::where('angkatan', '2024')->get();
        $psdm = psdm::where('angkatan', '2024')->get();
        $kwu = kwu::where('angkatan', '2024')->get();
        return view('userGuest.detail_pengurus', [
            'kominfo' => $kominfo, 'syiar' => $syiar, 'syiarr' => $syiarr,
            'kemuslimahan' => $kemuslimahan, 'psdm' => $psdm, 'kwu' => $kwu
        ]);
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