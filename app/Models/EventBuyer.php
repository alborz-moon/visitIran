<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBuyer extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';

    protected $fillable = [
        'first_name',
        'last_name',
        'nid',
        'phone',
        'paid',
        'count',
        'user_id',
        'event_id'
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }
}
