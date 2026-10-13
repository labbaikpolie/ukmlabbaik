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
        $artikel = Blog::orderByDesc('tanggal_post')->orderByDesc('id')->take(6)->get();
        $rapats = Rapat::orderByDesc('tanggal_rapat')->orderByDesc('id')->take(6)->get();
        $bph = Bph::all();
        $bphAkhir = collect();

        return view('userGuest.index', compact('artikel', 'rapats', 'bph', 'bphAkhir'));
    }

    public function artikel(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        $search = trim($filters['q'] ?? '');
        $artikel = Blog::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('judul', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when(!empty($filters['from']), fn ($query) => $query->whereDate('tanggal_post', '>=', $filters['from']))
            ->when(!empty($filters['to']), fn ($query) => $query->whereDate('tanggal_post', '<=', $filters['to']))
            ->orderByDesc('tanggal_post')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('userGuest.posts.index', [
            'type' => 'artikel',
            'items' => $artikel,
            'search' => $search,
            'dateFrom' => $filters['from'] ?? '',
            'dateTo' => $filters['to'] ?? '',
        ]);
    }

    public function rapat(Request $request)
    {
        $filters = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
        ]);

        $search = trim($filters['q'] ?? '');
        $rapats = Rapat::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('agenda_rapat', 'like', "%{$search}%")
                        ->orWhere('tempat_rapat', 'like', "%{$search}%")
                        ->orWhere('note', 'like', "%{$search}%")
                        ->orWhere('hasil_rapat', 'like', "%{$search}%");
                });
            })
            ->when(!empty($filters['from']), fn ($query) => $query->whereDate('tanggal_rapat', '>=', $filters['from']))
            ->when(!empty($filters['to']), fn ($query) => $query->whereDate('tanggal_rapat', '<=', $filters['to']))
            ->orderByDesc('tanggal_rapat')
            ->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        return view('userGuest.posts.index', [
            'type' => 'rapat',
            'items' => $rapats,
            'search' => $search,
            'dateFrom' => $filters['from'] ?? '',
            'dateTo' => $filters['to'] ?? '',
        ]);
    }

    /**
     * Halaman struktur pengurus (BPH + departemen).
     */
    public function detail_anggota()
    {
        $bph = Bph::all();
        $kominfo = Kominfo::all();
        $syiar = Syiar::all();
        $kemuslimahan = Kemuslimahan::all();
        $psdm = psdm::all();
        $kwu = kwu::all();
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