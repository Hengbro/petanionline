<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promomp extends Model
{
    protected $fillable = [
        'namapromomp',
        'deskripsipromomp',
        'syaratdanketentuan',
        'periodepromomp',
        'nominalpromomp',
        'kodepromomp',
        'gambarpromomp',
        
    ];
}
