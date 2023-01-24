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
            $filename_recp = storage_path('tmp/recp_' . time() . '.pdf');

            $pdf->save($filename);

            $data = [
                'email' => 'alborzmoon@gmail.com',
                'tel' => $event->data['phone'],
                'nid' => $event->data['nid'],
                'name' => $event->data['name'],
                'products' => [
                    [
                        'id' => '1',
                        'title' => 'ذدلاال',
                        'desc' => 'توضیحات1',
                        'count' => 2,
                        'price' => 200000,
                        'total' => 5000000,
                        'off' => 2000,
                        'total_after_off' => 3000000,
                        'total_after_off_tax' => 3200000,
                        'all' => 3200000
                    ],
                ],
                'total' => [
                    'total' => 6000000,
                    'off' => 3000,
                    'total_after_off' => 4000000,
                    'total_after_off_tax' => 4200000,
                    'all' => 4200000
                ]
            ];
    
            view()->share('data', $data);
    
            $pdf = Pdf::loadView('event.event.receipt_event', $data, [], 
                [
                    'format' => 'A4-L',
                    'display_mode' => 'fullpage'
                ]
            );

            $pdf->save($filename_recp);

            Mail::to('mghaneh1375@yahoo.com')->send(new EventRegistryMail($event), function ($message) use ($filename, $filename_recp) {
                $message->attach($filename);
                $message->attach($filename_recp);
            });

        }

        // Controller::sendSMS($event->phone, $event->eventName);
    }
}
