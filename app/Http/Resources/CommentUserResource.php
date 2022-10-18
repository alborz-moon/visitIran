<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentUserResource extends JsonResource
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
            'msg' => $this->msg,
            'rate' => $this->rate,
            'title' => $this->title,
            'negative' => explode('$$$___$$$', $this->negative),
            'positive' => explode('$$$___$$$', $this->positive),
            'user' => $user->first_name . ' ' . $user->last_name,
            'created_at' => Controller::MiladyToShamsi($this->created_at)
        ];
    }
}
