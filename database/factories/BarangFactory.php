<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nama = fake()->sentence(2);
        return [
            'nama' => fake()->sentence(2),
            'harga' => rand(10000, 2000000),
            'stok' => rand(5, 10),
            'deskripsi' =>  fake()->sentence(4),
            'gambar' => fake()->sentence(1),
        ];
    }
}
