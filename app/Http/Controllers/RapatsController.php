<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rapat;

class RapatsController extends Controller
{
    public function index()
{
    $rapats = Rapat::latest()->get(); // atau sesuaikan filter yang kamu mau
    return view('userGuest.index', compact('rapats'));
}
}