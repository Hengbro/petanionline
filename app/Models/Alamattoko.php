<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamattoko extends Model
{
    use HasFactory;
    protected $fillable = [
        'tokoId',
        'alamat',
        'label',
        'provinsi',
        'kota',
        'kecamatan',
        'kodepos',
        'provinsiId',
        'kotaId',
        'kecamatanId',
        'email',
        'phone',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];
}
