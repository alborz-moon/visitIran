<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class EventLauncherDigest extends JsonResource
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

        $sr = Controller::MiladyToShamsi($start_registry, '/');
        $er = Controller::MiladyToShamsi($end_registry, '/');

        return [
            'id' => $this->id,
            'created_at' => Controller::getPersianDate($this->created_at),
            'seen' => $this->seen,
            'buyers' => $this->buyers()->count(),
            'comment_count' => $this->comment_count,
            'new_comment_count' => $this->new_comment_count,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
            'status' => $this->status,
            'registry' => $sr . ' تا ' . $er,
            'slug' => $this->slug,
            'visibility' => $this->visibility,
            'title' => $this->title
        ];
    }
}
