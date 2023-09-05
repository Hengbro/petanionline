<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'tokoId',
        'namaproduk',
        'hargaproduk',
        'stockproduk',
        'kategoriproduk',
        'gambarproduk',
        'deskripsiproduk',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];
}
