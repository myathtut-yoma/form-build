<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $content)
    {
        //
    }

/**
 * Build the message.
 *
 * @return mixed
 */
    public function build()
    {
        return $this->subject('Form Submit')
            ->markdown('mail',['content'=>$this->content]);
    }
}
