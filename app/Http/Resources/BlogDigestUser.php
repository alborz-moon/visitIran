<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogDigestUser extends JsonResource
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
            'img' => $this->img == null ? asset('default.png') : asset('storage/blogs/' . $this->img),
            'header' => $this->header,
            'alt' => $this->alt,
            'tags' => $this->tags,
            'digest' => $this->digest,
            'slug' => $this->slug == null ? $this->header : $this->slug,
        ];
    }
}
