<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class LauncherResourceAdmin extends JsonResource
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
            'created_at' => Controller::getPersianDate($this->created_at),
            'user' => [
                // 'name' => $user->first_name . ' ' . $user->las_name,
                // 'phone' => $user->phone,

                'name' => "sad",
                'phone' => "022321321",
            ],
            'type' => $this->launcher_type,
            'status' => $this->status,
            'followers_count' => $this->followers_count,
            'seen' => $this->seen,
            'comment_count' => $this->comment_count,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
        ];
    }
}
