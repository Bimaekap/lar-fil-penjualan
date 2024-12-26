<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $guard = 'buyer';

    protected $fillable = [
        'user_id',
        'username',
        'nama_barang',
        'harga',
        'jumlah',
        'total',
        'no_pesanan',
        'gambar',
        'qr_code'
    ];
}
