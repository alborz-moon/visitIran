<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentDigest extends JsonResource
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
            'rate' => $this->rate,
            'status' => $this->status,
            'user' => $user->first_name . ' ' . $user->last_name,
            'msg' => $this->msg,
            'created_at' => Controller::MiladyToShamsi($this->created_at),
        ];
    }
}
