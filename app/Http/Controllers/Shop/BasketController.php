<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFeatures;
use Illuminate\Http\Request;

class BasketController extends Controller {
    
    public function check_basket(Request $request)
    {
        $validator = [
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
            'products.*.feature' => 'nullable',
        ];

        $request->validate($validator, self::$COMMON_ERRS);
        $errs = [];

        foreach($request['products'] as $product) {

            $p = Product::find($product['id']);

            $features = $p->productEffectiveFeatures();
            if($features != null && !isset($product['feature']))
                return abort(401);

            if(!isset($product['feature'])) {
                if($p->available_count < $product['count']) {
                    array_push($errs, ['موجودی محصول ' . $p->name]);
                }
            }
            else {
                $vals = explode('$$', explode('__', $features->value)[0]);
                $idx = in_array($product['feature'], $vals);
                if($idx === false)
                    return abort(401);
                
                if($features->available_count != null) {
                    
                    $counts = explode('$$', $features->available_count);

                    if(count($counts) > $idx && 
                        $counts[$idx] < $product['count'])
                    array_push($errs, ['موجودی محصول ' . $p->name]);
                }
            }
        }

        if(count($errs) > 0)
            return response()->json([
                'status' => 'ok',
                'errs' => $errs
            ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    
    public function finalize_basket(Request $request)
    {
        $validator = [
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.count' => 'required|integer|min:1',
            'products.*.feature' => 'nullable',
            'off' => 'nullable|string|min:1'
        ];

        $request->validate($validator, self::$COMMON_ERRS);
        $errs = [];
        $basket_items = [];

        foreach($request['products'] as $product) {

            $p = Product::find($product['id']);
            
            $features = $p->productEffectiveFeatures();
            if($features != null && !isset($product['feature']))
                return abort(401);

            $unit_price = $p->price;
            $off = $p->activeOff($request->user()->id);
            $off_amount = 0;

            if($off != null) {
                if($off['type'] == 'percent')
                    $unit_price = (100 - $off['amount']) * $unit_price / 100;
                else
                    $unit_price = max(0, $unit_price - $off['amount']);

                $off_amount = $p->price - $unit_price;
            }

            if(!isset($product['feature'])) {
                
                if($p->available_count < $product['count'])
                    array_push($errs, ['موجودی محصول ' . $p->name]);
                else {
                    array_push($basket_items, [
                        'count' => $product['count'],
                        'unit_price' => $unit_price,
                        'off' => $off,
                        'off_amount' => $off_amount,
                    ]);
                }
            }
            else {
                $vals = explode('$$', explode('__', $features->value)[0]);
                $idx = in_array($product['feature'], $vals);
                if($idx === false)
                    return abort(401);
                
                if($features->available_count != null) {
                    
                    $counts = explode('$$', $features->available_count);

                    if(count($counts) > $idx && 
                        $counts[$idx] < $product['count'])
                        array_push($errs, ['موجودی محصول ' . $p->name]);
                    else {
                        array_push($basket_items, [
                            'count' => $product['count'],
                            'unit_price' => $unit_price,
                            'off' => $off,
                            'off_amount' => $off_amount,
                            'feature' => 
                        ]); 
                    }
                }
            }
        }

        if(count($errs) > 0)
            return response()->json([
                'status' => 'nok',
                'errs' => $errs
            ]);

        return response()->json([
            'status' => 'ok'
        ]);
    }

    public function createBasket() {
        
    }

}
