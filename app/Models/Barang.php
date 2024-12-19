<?php

namespace App\Models;

use Database\Factories\BarangFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'id',
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
    ];

    protected static function newFactory()
    {
        return BarangFactory::new();
    }
}
