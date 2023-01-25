<?php

namespace App\Mail;

use App\Events\EventRegistry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventRegistryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $eventRegistry;
    public $filename;
    public $filename_recp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventRegistry $eventRegistry, $filename, $filename_recp)
    {
        $this->eventRegistry = $eventRegistry;
        $this->filename = $filename;
        $this->filename_recp = $filename_recp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->subject('جزییات سفارش')
                ->view('emails.event_registry', [
                    'name' => $this->eventRegistry->data['name'],
                    "invoice_no" => $this->eventRegistry->data['tracking_code'],
                    'event' => $this->eventRegistry->data['title']
                ])->attach($this->filename, [
                         'as' => 'ticket.pdf',
                         'mime' => 'application/pdf',
                ])->attach($this->filename_recp, [
                    'as' => 'recp.pdf',
                    'mime' => 'application/pdf',
           ]);
    }
}
