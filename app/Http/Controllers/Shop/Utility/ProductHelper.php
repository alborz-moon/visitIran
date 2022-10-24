<?php

namespace App\Http\Controllers\Shop\Utility;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class ProductHelper extends Controller {

    private static function get_all_subs_ids($cat) {
        
        $ids = [];
        array_push($ids, $cat->id);

        $subs = $cat->sub;
        if(count($subs) == 0)
            return $ids;

        foreach($subs as $sub) {
            $arr = self::get_all_subs_ids($sub);
            foreach($arr as $itr)
                array_push($ids, $itr);
        }

        return $ids;
    }

    public static function build_filters($request, $justVisibles=false) {
        
        $filters = Product::where('id', '>', '0');
        $cat = $request->query('category', null);
        $parent = $request->query('parent', null);
        $brand = $request->query('brand', null);
        $seller = $request->query('seller', null);
        $visibility = $request->query('visibility', null);
        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);
        $isInTopList = $request->query('isInTopList', null);
        $max = $request->query('max', null);
        $min = $request->query('min', null);
        $maxPrice = $request->query('maxPrice', null);
        $minPrice = $request->query('minPrice', null);
        $off = $request->query('off', null);
        $comment = $request->query('comment', null);

        $fromCreatedAt = $request->query('fromCreatedAt', null);
        $toCreatedAt = $request->query('toCreatedAt', null);

        if($cat != null)
            $filters->where('category_id', $cat);
            
        if($brand != null)
            $filters->where('brand_id', $brand);
            
        if($seller != null)
            $filters->where('seller_id', $seller);
            
        if($isInTopList != null)
            $filters->where('is_in_top_list', $isInTopList);
            
        if($fromCreatedAt != null)
            $filters->whereDate('created_at', '>=', self::ShamsiToMilady($fromCreatedAt));
            
        if($toCreatedAt != null)
            $filters->whereDate('created_at', '<=', self::ShamsiToMilady($toCreatedAt));

        if($min != null)
            $filters->where('available_count', '>=', $min);
            
        if($minPrice != null)
            $filters->where('price', '>=', $minPrice);
            
        if($maxPrice != null)
            $filters->where('price', '<=', $maxPrice);

        if($parent != null) {
            $filters->where('is_in_top_list', true);
            $parentCat = Category::whereId($parent)->first();
            if($parentCat == null)
                $filters->where('id', '<', 0);
            else {
                $catIds = self::get_all_subs_ids($parentCat);
                $filters->whereIn('category_id', $catIds);
            }
        }
        
        if($off != null) {
            $today = (int)self::getToday()['date'];
            if($off)
                $filters->whereNotNull('off')->where('off_expiration', '>=', $today);
            else
                $filters->where(function ($query) use ($today) {
                    $query->whereNull('off')->orWhere('off_expiration', '<', $today);
                });
        }

        $isAdmin = false;

        if($request->user() != null && (
            $request->user()->level == User::$ADMIN_LEVEL ||
            $request->user()->level == User::$EDITOR_LEVEL
        )) {
            
            $isAdmin = true;

            if($visibility != null)
                $filters->where('visibility', $visibility);
                
            if($comment != null) {
                if($comment)
                    $filters->where('new_comment_count', 0);
                else
                    $filters->where('new_comment_count', '>', 0);
            }
                
            if($max != null)
                $filters->where('available_count', '<=', $max);

        }
        else
            $filters->where('visibility', true);

        if($justVisibles && $isAdmin)
            $filters->where('visibility', true);

        if($orderByType == null || (
                $orderByType != 'asc' && 
                $orderByType != 'desc'
        ))
            $orderByType = 'desc';

        if($orderBy != null) {
            if($orderBy == 'createdAt')
                $filters->orderBy('id', $orderByType);
            else if(in_array($orderBy, ['rate', 'seen', 'price', 
                'rate_count', 'comment_count', 'new_comment_count', 'sell_count']))
                $filters->orderBy($orderBy, $orderByType);
        }
        else {
            $orderBy = 'createAt';
            $orderByType = 'desc';
            if($isAdmin)
                $filters->orderBy('id', 'desc');
            else
                $filters->orderBy('priority', 'asc');
        }

        return $filters;
    }

}

?>