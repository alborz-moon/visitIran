<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
            'comment_count' => $this->comment_count,
            'new_comment_count' => $this->new_comment_count,
            'name' => $this->name,
            'brand' => $this->brand->name,
            'category' => $this->category->name,
            'available_count' => $this->available_count,
            'is_in_top_list' => $this->is_in_top_list,
            'visibility' => $this->visibility,
            'priority' => $this->priority,
            'seen' => $this->seen,
            'price' => $this->price
        ];
    }
}
