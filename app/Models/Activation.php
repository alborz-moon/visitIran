<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    use HasFactory;
    
    protected $table = 'activations';

    protected $fillable = [
        'id',
        'phone',
        'code'
    ];

    protected $hidden = [
        'code'
    ];
}
