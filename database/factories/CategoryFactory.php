<?php

namespace Database\Factories;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{

    use HasFactory;

    public function definition(): array
    {
        $name = fake()->sentence(2);
        // generate random uuid
        $uuid = Str::uuid()->toString();
        return [
            'id' => $uuid,
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
