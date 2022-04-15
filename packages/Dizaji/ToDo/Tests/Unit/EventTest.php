<?php

namespace Dizaji\ToDo\Tests;

use Dizaji\ToDo\events\StatusChanged;
use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Assert;

//use PHPUnit\Framework\Assert;
//use PHPUnit\Framework\TestCase;
//use Webmozart\Assert\Assert;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_event_should_despatch()
    {
        Event::fake();
        $task = new Task();
        $task->title = "Fake Title";
        $task->description = "Fake Description";
        $task->status = 1;
        $task->user_id = 1;
//        Mail::assertNothingSent();

        StatusChanged::dispatch($task);
        Event::assertDispatched(StatusChanged::class,function ($job) use ($task) {
            return $job->task->id === $task->id;
        });
    }

}
