<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'id',
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
    ];
}
