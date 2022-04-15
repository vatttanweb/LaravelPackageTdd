<?php

namespace Dizaji\ToDo\events;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailNotification
{
    public function __construct()
    {
    }

    public function handle(StatusChanged $event)
    {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MyTestMail($details));

    }
}
