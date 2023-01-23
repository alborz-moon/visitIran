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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventRegistry $eventRegistry)
    {
        $this->eventRegistry = $eventRegistry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 
            $this->subject('Mail from Bogen studio')
                ->view('emails.event_registry', [
                    'title' => $this->eventRegistry->data['title'],
                    'body' => 'test'
                ]);
    }
}
