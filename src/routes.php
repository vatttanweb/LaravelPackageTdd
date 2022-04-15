<?php


use Illuminate\Support\Facades\Route;

Route::get('/tasks', 'Dizaji\ToDo\TaskController@tasks');
Route::get('/tasks/{id}', ['as'=>'id','uses'=>'Dizaji\ToDo\TaskController@edit']);
Route::put('/tasks','Dizaji\ToDo\TaskController@editPost');
Route::post('/tasks', 'Dizaji\ToDo\TaskController@create');
Route::get('/lables', 'Dizaji\ToDo\TaskController@lable');





Route::get('/create', function (){
    $task=null;
    return view('Dizaji.ToDo.task',compact('task'));
});
