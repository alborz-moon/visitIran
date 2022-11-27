<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class EventSessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $start = date("Y/m/d H:i", $this->start);
        $end = date("Y/m/d H:i", $this->end);

        $s = Controller::MiladyToShamsi($start, '/');
        $e = Controller::MiladyToShamsi($end, '/');

        return [
            'id' => $this->id,
            'start_date' => $s,
            'start_time' => explode(' ', $start)[1],
            'end_date' => $e,
            'end_time' => explode(' ', $end)[1],
        ];
    }
}
