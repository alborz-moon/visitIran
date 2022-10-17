<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user;
        return [
            'id' => $this->id,
            'msg' => $this->msg,
            'rate' => $this->rate,
            'title' => $this->title,
            'negative' => $this->negative,
            'positive' => $this->positive,
            'user' => $user->first_name . ' ' . $user->last_name
        ];
    }
}
