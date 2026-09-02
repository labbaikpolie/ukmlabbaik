<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Rapat;
use App\Models\Bph;

class ArtikelController extends Controller
{
    public function index()
{
    
    $artikel = Blog::latest()->get(); // ambil data artikel
    $rapats = Rapat::latest()->get(); // ambil data rapat juga
    $bph = Bph::latest()->get();
    return view('userGuest.index', compact('artikel', 'rapats','bph'));
}
}