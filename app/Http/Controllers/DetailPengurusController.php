<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kominfo;
use App\Models\Syiar;
use App\Models\psdm;
use App\Models\kwu;
use App\Models\Kemuslimahan;
use App\Models\MinatBakat;


class DetailPengurusController extends Controller
{

public function detailPengurus()
{
    $kominfo = Kominfo::all();
    $syiar = Syiar::all();
    $kwu = kwu::all();
    $psdm = psdm::all();
    $kemu = Kemuslimahan::all();
    $minatbakat = MinatBakat::all();
    return view('userGuest.detail_pengurus', compact('kominfo','syiar','kwu','psdm', 'kemu', 'minatbakat'));

}

}