<?php

namespace App\Http\Resources;

use App\Models\Config;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDigestUser extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $config = Config::first();

        $features = $this->featuresWithValue();
        $multiColor = false;

        foreach($features as $feature) {
            if($feature->name == 'multicolor') {
                $multiColor = true;
                break;
            }
        }
        
        $off = $this->activeOff($request->user == null ? null : $request->user->id);

        $priceAfterOff = $this->price;
        if($off != null && $off['type'] === 'value')
            $priceAfterOff = $this->price - $off['value'];
        else if($off != null)
            $priceAfterOff = $this->price * (100 - $off['value']) / 100;

        return [
            'id' => $this->id,
            'img' => $this->img == null ? asset('default.png') : asset('storage/products/' . $this->img),
            'alt' => $this->alt,
            'slug' => $this->slug == null ? $this->name : $this->slug,
            'rate' => $this->rate == null ? 4 : round($this->rate, 1),
            'name' => $this->name,
            'brand' => $this->brand->name,
            'brand_id' => $this->brand_id,
            'seller' => $this->seller_id == null ? '' : $this->seller->name,
            'seller_id' => $this->seller_id,
            'category' => $this->category->name,
            'is_in_critical' => $this->available_count <= $config->critical_point,
            'available_count' => $this->available_count <= $config->critical_point ? $this->available_count : -1,
            'price' => number_format($this->price, 0),
            'off' => $off,
            'priceAfterOff' => number_format($priceAfterOff, 0),
            'has_multi_color' => $multiColor,
            'href' => route('single-product', ['product' => $this->id, 'slug' => $this->slug == null ? $this->name : $this->slug])
        ];
    }
}
