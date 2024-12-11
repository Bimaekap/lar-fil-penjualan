<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'username',
        'nama_barang',
        'harga',
        'jumlah',
    ];
}
