<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_produk', 
        'merk', 
        'harga_beli', 
        'harga_jual', 
        'diskon', 
        'kategori_id', 
        'stok',
    ];

    protected $hidden =[];

    public function kategori (){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
