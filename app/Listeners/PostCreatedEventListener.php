<?php

namespace App\Listeners;

use App\Mail\PostStored;
use App\Mail\PostCreated;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedEventListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        
        Mail::to('hsulei@gmail.com')->send(new PostCreated($event->post));
    }
}
