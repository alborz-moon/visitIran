<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'is_bookmark',
        'msg',
        'rate'
    ];

    public static function userComment($productId, $userId) {
        return Comment::where('user_id', $userId)->where('product_id', $productId)->first();
    }

    public static function scopeComment($query, $productId) {
        return $query->where('product_id', $productId)->whereNotNull('msg');
    }

    public static function scopeRate($query, $productId) {
        return $query->where('product_id', $productId)->whereNotNull('rate');
    }

}
