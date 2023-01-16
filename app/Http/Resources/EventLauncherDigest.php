<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use App\Models\Event;
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

        $stepsStatus = null;
        if($this->status === Event::$INIT_STATUS) {

            $stepsStatus = [
                "first" => "done",
                "second" => "done",
                "third" => "done",
                "forth" => "done"
            ];

            if($this->sessions()->count() == 0)
                $stepsStatus['second'] = 'undone';

            if($this->price == null)
                $stepsStatus['third'] = 'undone';

            if($this->img == null || $this->description == null)
                $stepsStatus['forth'] = 'undone';

        }

        return [
            'id' => $this->id,
            'created_at' => Controller::MiladyToShamsi3($this->created_at->timestamp),
            'updated_at' => Controller::MiladyToShamsi3($this->updated_at->timestamp),
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
            'title' => $this->title,
            'stepsStatus' => $stepsStatus
        ];
    }
}
