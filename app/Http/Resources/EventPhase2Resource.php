<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Undefined;

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

        if($this->start_registry != null) {
            $start_registry = date("Y/m/d H:i", $this->start_registry);
            $s = Controller::MiladyToShamsi($start_registry, '/');
        }
        else {
            $start_registry = null;
            $s = null;
        }

        if($this->end_registry != null) {
            $end_registry = date("Y/m/d H:i", $this->end_registry);
            $e = Controller::MiladyToShamsi($end_registry, '/');
        }
        else {
            $end_registry = null;
            $e = null;
        }

        return [
            'id' => $this->id,
            'start_registry_date' => $s == null ? '' : $s,
            'start_registry_time' => $start_registry == null ? '' : explode(' ', $start_registry)[1],
            'end_registry_date' => $e == null ? '' : $e,
            'end_registry_time' => $end_registry == null ? '' : explode(' ', $end_registry)[1],
            'ticket_description' => $this->ticket_description,
            'price' => $this->price,
            'capacity' => $this->capacity,
            'site' => $this->site,
            'email' => $this->email,
            'phone' => $this->phone == null || empty($this->phone) ? null : explode('_', $this->phone),
            'mode' => $this->price == null ? 'create' : 'edit'
        ];
    }
}
