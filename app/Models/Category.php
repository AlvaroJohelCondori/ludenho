<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_description',
    ];

    public function getRouteKeyName()
    {
        return 'category_slug';
    }

    // Relación uno a muchos de categorías con productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
