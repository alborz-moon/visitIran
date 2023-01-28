<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    
    protected $table = 'purchase';

    public static $FINALIZED = "finalized";
    public static $SENDING = "sending";
    public static $DELIVERED = "delivered";

    public static $ONLINE = "online";
    public static $CASH = "cash";


    protected $fillable = [
        'id',
        'user_id',
        'address_id',
        'transaction_id',
        'payment_status',
        'status',
        'payment_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasManyThrough(Product::class, PurchaseItems::class);
    }
}
