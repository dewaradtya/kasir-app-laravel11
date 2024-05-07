<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'harga_jual',
        'jumlah',
        'diskon',
        'subtotal',
    ];

    protected $hidden =[];

    public function penjualan (){
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'id');
    }

    public function produk (){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
