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
        return [
            'id' => $this->id,
            'created_at' => Controller::getPersianDate($this->created_at),
            'user' => [
                'name' => $this->first_name . ' ' . $this->last_name,
                'phone' => $this->phone,
            ],
            'company_name' => $this->company_name,
            'type' => $this->launcher_type,
            'status' => $this->status,
            'followers_count' => $this->followers_count,
            'seen' => $this->seen,
            'comment_count' => $this->comment_count,
            'new_comment_count' => $this->new_comment_count,
            'rate' => $this->rate,
            'rate_count' => $this->rate_count,
        ];
    }
}
