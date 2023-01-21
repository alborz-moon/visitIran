<?php

namespace App\Listeners;

use App\Events\EventRegistry;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEventRegistryNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EventRegistry  $event
     * @return void
     */
    public function handle(EventRegistry $event)
    {
        Controller::sendSMS($event->phone, $event->eventName);
    }
}
