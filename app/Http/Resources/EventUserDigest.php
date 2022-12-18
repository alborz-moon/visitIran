<?php

namespace App\Http\Resources;

use App\Models\Event;
use App\Models\Launcher;
use Illuminate\Http\Resources\Json\JsonResource;

class EventUserDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        if($this->resource instanceof Event) {
            $launcher = $this->launcher->company_name;
            $city = $this->city_id != null ? $this->city->name : null;
            $off = $this->activeOff();
        }
        else {
            $launcher = $this->company_name;
            $city = $this->city;
            $off = Event::staticActiveOff($this->off, $this->off_expiration, $this->off_type);
        }

        $priceAfterOff = $this->price;
        if($off != null && $off['type'] === 'value')
            $priceAfterOff = $this->price - $off['value'];
        else if($off != null)
            $priceAfterOff = $this->price * (100 - $off['value']) / 100;

        return [
            'id' => $this->id,
            'img' => $this->img == null ? asset('default.png') : asset('storage/products/' . $this->img),
            'alt' => $this->alt,
            'slug' => $this->slug == null ? $this->title : $this->slug,
            'rate' => $this->rate == null ? 4 : round($this->rate, 1),
            'name' => $this->title,
            'launcher' => $launcher,
            'price' => number_format($this->price, 0),
            'off' => $off,
            'category' => $this->tags,
            'priceAfterOff' => number_format($priceAfterOff, 0),
            'place' => $this->city_id != null ? $city : $this->link
        ];
    }
}
