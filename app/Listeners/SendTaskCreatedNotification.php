<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use App\Mail\TaskCreated as MailTaskCreated;

class SendTaskCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        \Mail::to($event->task->author->email)->send(
            new MailTaskCreated($event->task)
        );
    }
}