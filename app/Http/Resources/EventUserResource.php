<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class EventUserResource extends JsonResource
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
        $start = date("Y/m/d H:i", $this->start);
        $end = date("Y/m/d H:i", $this->end);

        $sr = Controller::MiladyToShamsi($start_registry, '/');
        $er = Controller::MiladyToShamsi($end_registry, '/');
        $s = Controller::MiladyToShamsi($start, '/');
        $e = Controller::MiladyToShamsi($end, '/');
        
        $launcher = $this->launcher;

        return [
            'id' => $this->id,
            'launcher_id' => $this->launcher_id,
            'launcher_title' => $launcher->title,
            'launcher_rate' => $launcher->rate == null ? 4 : $launcher->rate,
            'launcher_rate_count' => $launcher->rate_count,
            'launcher_is_following' => true,
            'start' => $s,
            'end' => $e,
            'start_registry' => $sr,
            'end_registry' => $er,
            'start_registry_time' => explode(' ', $start_registry)[1],
            'end_registry_time' => explode(' ', $end_registry)[1],
            'img' => $this->img != null ? asset('storage/events/' . $this->img) : asset('storage/events/default.img'),
            'title' => $this->title,
            'age_description' => $this->age_description,
            'level_description' => $this->level_description,
            'ticket_description' => $this->ticket_description,
            'tags' => explode('_', $this->tags),
            'language' => explode('_', $this->language),
            'facilities' => explode('_', $this->facilities),
            'type' => $this->city_id != null ? 'offline' : 'online',
            'address' => $this->address,
            'link' => $this->link,
            'site' => $this->site,
            'email' => $this->email,
            'phone' => $this->phone == null || empty($this->phone) ? null : explode('_', $this->phone),
            'price' => $this->price,
            'slug' => $this->slug == null ? $this->title : $this->slug,
            'digest' => $this->digest,
            'keywords' => $this->keywords,
            'seo_tags' => $this->seo_tags,
            // 'city' => $this->city->name
        ];
    }
}
