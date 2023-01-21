<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class MyEventsDigest extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $event = $this->event;

        $start = null;
        $end = null;

        $endSession = $event->sessions()->orderBy('end', 'desc')->first();
        $startSession = $event->sessions()->orderBy('end', 'asc')->first();

        if($endSession == null)
            $end = '';
        else
            $end = Controller::MiladyToShamsi2($endSession->end);
            

        if($startSession == null)
            $start = '';
        else
            $start = Controller::MiladyToShamsi2($startSession->start);

        return [
            'launcher' => $event->launcher->company_name,
            'start' => $start,
            'end' => $end,
            'href' => route('event', ['id' => $event->id, 'slug' => $event->slug]),
            'ticket_href' => route('recv', ['eventBuyer' => $this->id]),
            'title' => $this->title,
        ];
    }
}
