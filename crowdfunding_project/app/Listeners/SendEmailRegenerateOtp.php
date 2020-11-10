<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegenerateOtpEvent;
use App\Mail\UserRegenerateOtpMail;
use Mail;

class SendEmailRegenerateOtp implements ShouldQueue
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
     * @param  SendEmailRegenerateOtp  $event
     * @return void
     */
    public function handle(UserRegenerateOtpEvent $event)
    {
        Mail::to($event->user)->send(new UserRegenerateOtpMail($event->user));
    }
}
