<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class psdm extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getFotoUrlAttribute()
    {
        if (!empty($this->foto) && Storage::disk('public')->exists($this->foto)) {
            return url('storage/' . $this->foto);
        }
        return asset('assets/images/no-image.png');
    }
}
