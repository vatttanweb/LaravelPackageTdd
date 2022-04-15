<?php

namespace Dizaji\ToDo\Repositories;

use Dizaji\ToDo\events\StatusChanged;
use Dizaji\ToDo\Lable;
use Dizaji\ToDo\Task;
use Dizaji\ToDo\User;
use Illuminate\Http\Request;

class Repository implements RepositoryInterface
{

    public function addTask(\Illuminate\Http\Request $request)
    {
        return $this->createEdit($request, "create");
    }

    public function editTask(Request $request)
    {
        return $this->createEdit($request, "edit");
    }


    /**
     * @param Request $request
     * @return mixed
     */
    private function createEdit(Request $request, string $typeOfAction)
    {
        $explodedLables = explode(",", $request->lables);
        $lablesArray = array();
        foreach ($explodedLables as $lable) {
            $newLable = new Lable();
            $newLable->lablename = $lable;
            array_push($lablesArray, $newLable);
        }
        if ($typeOfAction == "create") {
            $task = new Task();
            if ($request->status != null) {
                $task->status = true;
            }
        } else {

            $task = Task::find($request->id);
            if ($request->status != null) {
                $task->status = true;

            }else{
                $task->status = false;
                StatusChanged::dispatch($task);
            }
        }
        $task->title = $request->title;
        $task->description = $request->description;

        $user = User::where('token', '=', $request->token)->first();
//        dd($user);
        $user->tasks()->save($task);
        $task->lables()->saveMany($lablesArray);
        return $task;
    }

}
