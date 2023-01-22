<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;


    public static $COMPLETED_STATUS = 'completed';
    public static $INIT_STATUS = 'init';
    public static $CANCELLED_STATUS = 'cancelled';

    protected $fillable = [
        'off_id',
        'off_amount',
        'additional',
        'amount',
        'transaction_code',
        'tracking_code',
        'ref_id',
        'user_id',
        'status',
        'site'
    ];

    public function scopeComplete($query) {
        return $query->where('status', 'completed');
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function off() {
        return $this->belongsTo(Off::class);
    }

}
