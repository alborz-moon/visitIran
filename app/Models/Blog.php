<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'header',
        'img',
        'description',
        'visibility',
        'priority',
        'digest',
        'keywords',
        'tags',
        'article_tags',
        'alt',
        'slug'
    ];

}
