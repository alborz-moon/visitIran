<?php

namespace App\Listeners;

use App\Events\BuyEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuyEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(BuyEvent $event)
    {
        if($event->mail != null) {

            // $pdf = EventBuyerController::doGenerateTicketPDF($event->event);
            // $filename = storage_path('tmp/' . time() . '.pdf');
            // $pdf->save($filename);

        }
    }
}
