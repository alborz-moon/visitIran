<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class EventPhase2Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $start_registry = date("Y/m/d H:i", $this->start_registry);
        $end_registry = date("Y/m/d H:i", $this->end_registry);

        $s = Controller::MiladyToShamsi($start_registry, '/');
        $e = Controller::MiladyToShamsi($end_registry, '/');

        return [
            'id' => $this->id,
            'start_registry_date' => $s,
            'start_registry_time' => explode(' ', $start_registry)[1],
            'end_registry_date' => $e,
            'end_registry_time' => explode(' ', $end_registry)[1],
            'ticket_description' => $this->ticket_description,
            'price' => $this->price,
            'capacity' => $this->capacity,
            'site' => $this->site,
            'email' => $this->email,
            'phone' => $this->phone == null || empty($this->phone) ? null : explode('_', $this->phone),
        ];
    }
}
