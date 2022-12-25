<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LauncherVeryDigest extends JsonResource
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
        //todo: uncomment

        return [
            'id' => $this->id,
            'user' => [
                // 'name' => $user->first_name . ' ' . $user->last_name,
                // 'phone' => $user->phone,
                'name' => '',
                'phone' => '',
            ],
            'company_name' => $this->company_name
        ];
    }
}
