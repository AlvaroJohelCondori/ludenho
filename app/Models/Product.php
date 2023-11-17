<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /*protected $fillable = [
        'category_id ',
        'user_id ',
        'product_name',
        'product_slug',
        'product_extract',
        'product_body',
        'product_status',
    ];*/

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // Relación uno a muchos inversa de categorías con productos
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación uno a muchos inversa de usuarios con productos
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación muchos a muchos de materiales con productos
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    // Relación polimórfica uno a uno
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
