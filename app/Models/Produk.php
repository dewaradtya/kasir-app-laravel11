<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'kategori_id', 'harga', 'is_active', 'description', 'jumlah', 'file','views'
    ];

    protected $hidden =[];

    public function kategori (){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
