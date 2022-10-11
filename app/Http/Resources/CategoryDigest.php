<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryDigest extends JsonResource
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
            'name' => $this->name,
            'alt' =>  $this->alt,
            'digest' =>  $this->digest,
            'priority' =>  $this->priority,
            'visibility' =>  $this->visibility,
            'has_sub' => $this->sub()->count() > 0,
            'parent_id' => $this->parent_id,
            'img' => $this->img == null ? asset('default.png') : asset('storage/categories/' . $this->img)
        ];
    }
}
