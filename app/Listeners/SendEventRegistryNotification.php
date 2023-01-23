<?php

namespace App\Listeners;

use App\Events\EventRegistry;
use App\Mail\EventRegistryMail;
use Illuminate\Support\Facades\Mail;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

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

        if($event->mail != null) {

            view()->share('data', $event->data);

            $pdf = Pdf::loadView('event.event.ticket', $event->data, [], 
                [
                    'format' => 'A5-L',
                    'display_mode' => 'fullpage'
                ]
            );
            
            $filename = storage_path('tmp/' . time() . '.pdf');

            $pdf->save($filename);

            Mail::to('mghaneh1375@yahoo.com')->send(new EventRegistryMail($event), function ($message) use ($filename) {
                $message->attach($filename);
            });

        }

        // Controller::sendSMS($event->phone, $event->eventName);
    }
}
