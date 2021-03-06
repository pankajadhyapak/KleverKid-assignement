<?php

namespace App\Listeners;

use App\Events\AcademyViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAcademyViewedMail
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AcademyViewed  $event
     * @return void
     */
    public function handle(AcademyViewed $event)
    {

        Mail::queue('emails.academyviewed', ['academy' => $event->academy, 'ip' => $event->ip], function ($m){
            $m->from('views@kleverkid.com', 'Klever Kid');
            $m->to('pankajkleverkid@gmail.com', 'Klever kid Admin')->subject('New Academy View');
        });

    }
}
