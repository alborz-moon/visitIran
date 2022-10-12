<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'img_large',
        'img_mid',
        'img_small',
        'href',
        'alt',
        'priority',
        'visibility',
    ];

    public function scopeVisible($query) {
        return $query->where('visibility', true);
    }

}
