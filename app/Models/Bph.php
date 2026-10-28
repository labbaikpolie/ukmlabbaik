<?php

namespace App\Models;

use App\Http\Traits\HandlesPhotoUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bph extends Model
{
    use HandlesPhotoUpload;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jabatan',
        'foto',
        'moto',
        'angkatan',
        'prodi',
    ];
}
