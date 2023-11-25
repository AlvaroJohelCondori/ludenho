<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_title',
        'start_subtitle',
        'start_color',
        'start_state',
    ];

    // Relación polimórfica uno a uno
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
