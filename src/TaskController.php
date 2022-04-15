<?php
namespace Dizaji\ToDo;

use App\Http\Controllers\Controller;
use Dizaji\ToDo\Repositories\RepositoryInterface;
use Illuminate\Http\Request;
use function redirect;
use function view;

class TaskController extends Controller
{
    protected $repository;
    function __construct(RepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function tasks()
    {
        $tasks = Task::with()->get();
        return response()->json($tasks);
        return view('Dizaji.ToDo.taskList',compact('tasks'));
    }

    public function create(Request $request)
    {
       $result =  $this->repository->addTask($request);
        $task=null;
        return response()->json($result);
        return view('Dizaji.ToDo.task',compact('task'));
    }


    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task);
        return view('Dizaji.ToDo.task',compact('task'));
    }

    public function editPost(Request $request)
    {
        $task=$this->repository->editTask($request);
        return response()->json($task);
        return view('Dizaji.ToDo.task',compact('task'));
    }

    public function lable()
    {
        $lables = Lable::all();
        return response()->json($lables);
    }


}
