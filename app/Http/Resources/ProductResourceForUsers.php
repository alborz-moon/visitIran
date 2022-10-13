<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Config;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResourceForUsers extends JsonResource
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
        
        $off = $this->activeOff();

        $priceAfterOff = $this->price;
        if($off != null && $off['type'] === 'value')
            $priceAfterOff = $this->price - $off['value'];
        else if($off != null)
            $priceAfterOff = $this->price * (100 - $off['value']) / 100;

        $cat = $this->category;

        $parentPath = [];
        array_push($parentPath, $this->name);
        array_push($parentPath, $cat->name);
        $tmpCat = $cat;
        while($tmpCat->parent_id != null) {
            $tmpCat = $tmpCat->parent;
            array_push($parentPath, $tmpCat->name);
        }

        return [
            'id' => $this->id,
            'img' => $this->img == null ? asset('default.png') : asset('storage/products/' . $this->img),
            'alt' => $this->alt,
            'description' => $this->description,
            'keywords' => $this->keywords,
            'digest' => $this->digest,
            'rate' => $this->rate == null ? 4 : $this->rate,
            'name' => $this->name,
            'brand' => $this->brand->name,
            'seller' => $this->seller_id == null ? '' : $this->seller->name,
            'category' => $cat->name,
            'parentPath' => $parentPath,
            'is_in_critical' => $this->available_count <= $config->critical_point,
            'available_count' => $this->available_count <= $config->critical_point ? $this->available_count : -1,
            'price' => number_format($this->price, 0),
            'off' => $off,
            'priceAfterOff' => number_format($priceAfterOff, 0),
            'has_multi_color' => $multiColor,
            'all_comments_count' => Comment::comment($this->id)->count(),
            'all_rates_count' => Comment::rate($this->id)->count(),
            'gaurantee' => $this->gaurantee,
            'introduce' => $this->introduce
        ];
    }
}
