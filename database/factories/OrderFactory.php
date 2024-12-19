<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Barang;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = User::find(1);

        $barang = Barang::find(rand(1, 10));
        return [
            'user_id' => $id,
            'username' => $id->name,
            'nama_barang' => $barang->nama,
            'harga' => $barang->harga,
            'jumlah' => rand(1, 15),
            'product_code' =>  rand(200, 31512),
        ];
    }
}
