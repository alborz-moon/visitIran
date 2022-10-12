<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductFeatures;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'category_feature_id' => 'required|exists:category_features,id',
            'price' => 'nullable|integer|min:0',
            'count' => 'nullable|integer|min:0'
        ];

        $request->validate($validator);

        $categoryFeature = Feature::whereId($request['category_feature_id'])->first();

        if($product->category_id != $categoryFeature->category_id)
            return abort(401);

        $validator = null;
        if($categoryFeature->answer_type == 'number') {
            $validator = [
                'value' => 'required|integer|min:0'
            ];
        }
        else if($categoryFeature->answer_type == 'multi_choice') {
            $choices = explode('__', $categoryFeature->choices);
            $validator = [
                'value' => ['required', Rule::in($choices)]
            ];
        }
        if($validator != null)
            $request->validate($validator);

        $pf = ProductFeatures::where('category_feature_id', '=', $request['category_feature_id'])->first();
        if($pf == null) {
            $pf = new ProductFeatures();
            $pf->product_id = $product->id;
            $pf->category_feature_id = $request['category_feature_id'];
        }

        $pf->value = $request['value'];

        if($request->has('price'))
            $pf->price = $request['price'];

        if($request->has('count'))
            $pf->available_count = $request['count'];

        $pf->save();

        return response()->json(
            ['status' => 'ok']
        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFeatures $productFeature)
    {
        $productFeature->delete();
        return response()->json(['status' => 'ok']);
    }


}
