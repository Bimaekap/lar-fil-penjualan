<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'slug',
        'name'
    ];

    protected $table = 'shop_categories';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
