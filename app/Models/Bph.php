<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bph extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function index()
{
    // pakai try-catch untuk debugging
    try {
        $bph = Bph::all();
        $bphAkhir = collect(); // sementara kosong

        return view('landing.index', compact('bph', 'bphAkhir'));
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
}