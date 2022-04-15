@extends('Dizaji.ToDo.Layout.layout')
@section('content')
    @foreach($tasks as $task)
        <div class="card" style="width: 18rem;text-align: center;border: 1px solid #a99a9a;padding: 6%;">
            <div class="card-body">
                <h5 class="card-title">Title: {{$task->title}}</h5>
                <hr>
                <h6 class="card-subtitle mb-2 text-muted">Status:{{$task->status}}</h6>
                <hr>
                @foreach($task->lables()->get() as $lable)
                    <h6 class="card-subtitle mb-2 text-muted">Lables:{{$lable->lablename}}</h6>
                @endforeach
                <hr>
                <p class="card-text">Description:{{$task->description}}</p>
                <hr>
                <a href="/edit/{{$task->id}}" class="card-link">Edit</a>
                <form method="post" action="/delete">
                    {{@csrf_field()}}
                    <input hidden name="id" value="{{$task->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection
