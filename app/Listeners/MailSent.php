<?php

namespace App\Listeners;

use App\Mail\FormSendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailSent
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
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::findorFail($event->content->user_id);
        Mail::to($user->email)->send(new FormSendMail($event->content));
    }
}
