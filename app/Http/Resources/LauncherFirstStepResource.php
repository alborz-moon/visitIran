<?php

namespace App\Http\Resources;

use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

class LauncherFirstStepResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'user_NID' => $this->user_NID,
            'user_email' => $this->user_email,
            'user_birth_day' => $this->user_birth_day,
            'launcher_type' => $this->launcher_type,
            'company_name' => $this->company_name,
            'company_type' => $this->company_type,
            'postal_code' => $this->postal_code,
            'code' => $this->code,
            'launcher_address' => $this->launcher_address,
            'launcher_state_id' => City::whereId('id', $this->launcher_city_id)->first()->state->id,
            'launcher_city_id' => $this->launcher_city_id,
            'launcher_email' => $this->launcher_email,
            'launcher_site' => $this->launcher_site,
            'launcher_phone' => $this->launcher_phone,
            'launcher_x' => $this->launcher_x,
            'launcher_y' => $this->launcher_y
        ];
    }
}
