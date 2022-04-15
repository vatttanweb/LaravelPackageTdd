<?php

namespace Dizaji\ToDo\Tests;

use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Assert;

//use PHPUnit\Framework\Assert;
//use PHPUnit\Framework\TestCase;
//use Webmozart\Assert\Assert;

class LableTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_lable_should_create_correct()
    {
        $task = new Lable();
        $task->lablename = "Fake lablename";
        $this->assertEquals("Fake lablename", $task->lablename);
    }
    /** @test */
    public function a_comment_belongs_to_a_post()
    {
        $task = new Task();
        $task->title = "Fake Title";
        $task->description = "Fake Description";
        $task->status = 1;
        $task->user_id = 1;
        $lable = new Lable();
        $lable->lablename = "fake lablename";
        $task->save();
        $task->lables()->save($lable);
        $this->assertEquals(1, $lable->task->count());
        $this->assertInstanceOf(Task::class, $lable->task);
    }
}
