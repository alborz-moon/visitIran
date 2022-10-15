<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'img',
        'price',
        'description',
        'available_count',
        'is_in_top_list',
        'visibility',
        'off',
        'off_type',
        'off_expiration',
        'priority',
        'brand_id',
        'category_id',
        'digest',
        'keywords',
        'tags',
        'seller_id',
        'alt',
        'guarantee',
        'introduce',
        'slug'
    ];
    
    public $timestamps = false;

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    
    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function galleries() {
        return $this->hasMany(ProductGallery::class);
    }

    public function scopeVisible($query) {
        return $query->where('visibility', true);
    }
    
    public function scopeTop($query) {
        return $query->where('is_in_top_list', true);
    }

    public function features() {
        return DB::select(
            'select category_features.*, product_features.price,' . 
            '  product_features.available_count, product_features.value,' . 
            ' product_features.id as product_features_id from category_features ' .
            'left join product_features on ' . 
                'category_features.id = product_features.category_feature_id and '.
                'product_features.product_id = ' . $this->id .
                ' where category_features.category_id = ' . $this->category_id
        );
    }

    public function featuresWithValue() {
        $features = DB::select(
            'select category_features.id, category_features.unit, category_features.show_in_top, ' .
                'category_features.name, product_features.value, ' . 
                'product_features.price, product_features.available_count ' . 
                'from category_features join product_features on ' . 
                'category_features.id = product_features.category_feature_id and '.
                'product_features.product_id = ' . $this->id .
              ' where category_features.category_id = ' . $this->category_id . 
              ' order by category_features.priority asc'
        );
        return $features;
    }

    public function activeOff() {

        if($this->off != null) {
            $today = (int)Controller::getToday()['date'];
            if((int)$this->off_expiration >= $today)
                return [
                    'type' => $this->off_type,
                    'value' => $this->off
                ];
        }

    }
}
