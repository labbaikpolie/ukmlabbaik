<?php

namespace App\Models;

use App\Http\Traits\HandlesPhotoUpload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapat extends Model
{
    use HandlesPhotoUpload;
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
}
