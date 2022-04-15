<?php

namespace Dizaji\ToDo\Tests;

use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Assert;

//use PHPUnit\Framework\Assert;
//use PHPUnit\Framework\TestCase;
//use Webmozart\Assert\Assert;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_task_should_create_correct()
    {
        //We can divide it to 4 test
        $task = new Task();
        $task->title = "Fake Title";
        $task->description = "Fake Description";
        $task->status = 1;
        $task->user_id = 1;
        $this->assertEquals("Fake Title", $task->title);
        $this->assertEquals("Fake Description", $task->description);
        $this->assertEquals(1, $task->status);
        $this->assertEquals(1, $task->user_id);
    }
    /** @test */

    function a_task_should_place_lables(){
        $task = new Task();
        $task->title = "Fake Title";
        $task->description = "Fake Description";
        $task->status = 1;
        $task->user_id = 1;
        $lable = new Lable();
        $lable->lablename = "fake lablename";
        $task->save();
        $task->lables()->save($lable);
        $this->assertTrue($task->lables->contains($lable));

    }
}
