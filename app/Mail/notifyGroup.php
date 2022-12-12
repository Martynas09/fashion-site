<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notifyGroup extends Mailable
{
    use Queueable, SerializesModels;
    public $description;
    public $time;
    public $activity;
    public $address;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($description,$time,$activity,$address)
    {
        $this->description = $description;
        $this->time = $time;
        $this->activity = $activity;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Grupinės veiklos informacija')->markdown('emails.notifyGroup');
    }
}
