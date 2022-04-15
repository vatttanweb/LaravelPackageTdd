<?php
namespace Dizaji\ToDo\Repositories;
use Illuminate\Http\Request;

interface RepositoryInterface {
    public function addTask(\Illuminate\Http\Request $request);

    public function editTask(Request $request);

}
?>
