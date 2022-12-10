<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Purchase extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $name;
    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$name,$title)
    {
        $this->email = $email;
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Paslaugos užsakymas')->markdown('emails.purchase');
    }
}
