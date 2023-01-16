<?php

namespace App\Http\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Undefined;

class EventPhase2Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $sr = Controller::MiladyToShamsi2($this->start_registry);
        $er = Controller::MiladyToShamsi2($this->end_registry);

        if($this->start_registry != null) {
            $start_registry = date("Y/m/d H:i", $this->start_registry);
            $s = Controller::MiladyToShamsi($start_registry, '/');
        }
        else {
            $start_registry = null;
            $s = null;
        }

        if($this->end_registry != null) {
            $end_registry = date("Y/m/d H:i", $this->end_registry);
            $e = Controller::MiladyToShamsi($end_registry, '/');
        }
        else {
            $end_registry = null;
            $e = null;
        }

        $launcher = $this->launcher;

        $useFromLauncher = false;

        if($this->site == null && $this->email == null && $this->phone == null)
            $useFromLauncher = true;

        $site = $useFromLauncher ? $launcher->site : $this->site;
        $mail = $useFromLauncher ? $launcher->launcher_email : $this->email;
        $phone = $useFromLauncher ? $launcher->launcher_phone : $this->phone;

        $phone = $useFromLauncher ? explode('__', $phone) : explode('_', $phone);

        return [
            'id' => $this->id,
            'start_registry' => $sr,
            'end_registry' => $er,
            'start_registry_date' => $s == null ? '' : $s,
            'start_registry_time' => $start_registry == null ? '' : explode(' ', $start_registry)[1],
            'end_registry_date' => $e == null ? '' : $e,
            'end_registry_time' => $end_registry == null ? '' : explode(' ', $end_registry)[1],
            'ticket_description' => $this->ticket_description,
            'price' => $this->price,
            'capacity' => $this->capacity,
            'site' => $site,
            'email' => $mail,
            'phone' => $phone == null || empty($phone) ? null : $phone,
            'mode' => $this->status == 'init' ? 'create' : 'edit'
        ];
    }
}
