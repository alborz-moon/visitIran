<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LauncherCert extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'launcher_certifications';

    protected $fillable = [
        'launcher_id',
        'file'
    ];

}
