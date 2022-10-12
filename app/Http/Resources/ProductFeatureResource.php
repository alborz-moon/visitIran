<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $tmp = explode('$$', $this->value);
        $value = count($tmp) == 2 ? $tmp[0] : $this->value;

        $value = $this->unit == null ? $value : $value . ' ' . $this->unit;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'available_count' => $this->available_count,
            'value' => $value,
            'label' => count($tmp) == 2 ? $tmp[1] : '',
            'show_in_top' => $this->show_in_top
        ];
    }
}
