<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
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
            'name' => $this->name,
            'show_in_top' => $this->show_in_top,
            'effect_on_price' => $this->effect_on_price,
            'effect_on_available_count' => $this->effect_on_available_count,
            'unit' => $this->unit,
            'answer_type' => $this->answer_type,
            'priority' => $this->priority,
            'choices' => $this->answer_type == 'multi_choice' ? $this->choices : null
        ];
    }
}
