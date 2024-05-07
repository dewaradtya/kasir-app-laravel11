<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'harga_beli',
        'jumlah',
        'subtotal',
    ];

    protected $hidden =[];

    public function pembelian (){
        return $this->belongsTo(Pembelian::class, 'pembelian_id', 'id');
    }

    public function produk (){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
