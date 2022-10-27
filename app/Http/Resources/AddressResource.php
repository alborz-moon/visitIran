<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'x' => $this->x,
            'y' => $this->y,
            'city' => [
                'id' => $this->city_id,
                'name' => $this->city->name
            ],
            'recv_name' => $this->recv_name,
            'recv_phone' => $this->recv_phone,
            'recv_last_name' => $this->recv_last_name,
        ];
    }
}
