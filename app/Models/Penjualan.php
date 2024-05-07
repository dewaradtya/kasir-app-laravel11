<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'total_item',
        'total_harga',
        'diskon',
        'bayar',
        'diterima', 
        'user_id'
    ];

    protected $hidden =[];

    public function member (){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function user (){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
