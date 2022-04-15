<?php

namespace Dizaji\ToDo;

use Dizaji\ToDo\events\EmailNotification;
use Dizaji\ToDo\events\LogNotification;
use Dizaji\ToDo\events\StatusChanged;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        StatusChanged::class => [
            LogNotification::class,
            EmailNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
