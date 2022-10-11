<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductFeatures;
use Illuminate\Http\Request;

class ProductFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.product.features.list', [
            'items' => $product->features(),
            'productId' => $product->id,
            'productName' => $product->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductFeatures  $productFeatures
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        $validator = [
            'value' => 'required',
            'category_feature_id' => 'required|exists:category_features,id'
        ];

        $request->validate($validator);

        $categoryFeature = Feature::whereId($request['category_feature_id'])->first();

        if($product->category_id != $categoryFeature->category_id)
            return abort(401);

        $pf = ProductFeatures::where('category_feature_id', '=', $request['category_feature_id'])->first();
        if($pf == null) {
            $pf = new ProductFeatures();
            $pf->product_id = $product->id;
            $pf->category_feature_id = $request['category_feature_id'];
        }

        $pf->value = $request['value'];
        $pf->save();

        return response()->json(
            ['status' => 'ok']
        );
    }

}
