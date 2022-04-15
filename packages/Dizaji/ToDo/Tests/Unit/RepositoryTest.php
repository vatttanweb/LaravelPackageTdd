<?php

namespace Dizaji\ToDo\Tests;

use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Repositories\Repository;
use Dizaji\ToDo\Repositories\RepositoryInterface;
use Dizaji\ToDo\Task;
use Dizaji\ToDo\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use PHPUnit\Framework\Assert;

//use PHPUnit\Framework\Assert;
//use PHPUnit\Framework\TestCase;
//use Webmozart\Assert\Assert;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_task_should_create_correct()
    {
        $task = new Task();
        $task->title = "Fake Title";
        $task->description = "Fake Description";
        $task->status = 1;
        $task->user_id = 1;
        $lable = new Lable();
        $lable->lablename = "fake lablename";
        $task->save();
        $user = new User();
        $user->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
        $user->save();
        $request = new Request();
        $request->id = $task->id;
        $request->lables = "a1,a2,a3";
        $request->status = true;
        $request->title = "titeTest";
        $request->description = "descriptionTest";
        $request->token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ";
        $re = new Repository();
        $returnTask = $re->editTask($request);
        $this->assertNotNull($returnTask);
    }
}
