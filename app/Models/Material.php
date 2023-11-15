<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_name',
        'material_slug',
        'material_description',
        'material_color',
    ];

    public function getRouteKeyName()
    {
        return 'material_slug';
    }

    // Relación inversa muchos a muchos de productos con materiales
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
