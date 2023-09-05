<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'produkId',
        'tokoId',
        'jumlah',
        'isActive',
    ];
    protected $casts = [
        'isActive' => 'boolean'
    ];

    public function user(){
        return $this->belongsTo(User::class, "userId", "id");
    }
    public function produk(){
        return $this->belongsTo(Produk::class, "produkId", "id");
    }
    public function toko(){
        return $this->belongsTo(Produk::class, "tokoId", "id");
    }
}
