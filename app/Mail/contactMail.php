<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $object;
    private $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $object, $content)
    {
        $this->name = $name;
        $this->email = $email;
        $this->object = $object;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
        ->subject($this->tilte)
        ->view('mails.contact')
        ->with('name', $this->name)
        ->with('content', $this->content);
    }
}
