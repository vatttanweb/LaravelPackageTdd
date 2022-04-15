<?php

namespace Dizaji\ToDo\events;

use Illuminate\Support\Facades\Log;

class LogNotification
{
    public function __construct()
    {
    }

    public function handle(StatusChanged $event)
    {
        Log::info("Status of task with id:".$event->task->id."was changed");
    }
}
