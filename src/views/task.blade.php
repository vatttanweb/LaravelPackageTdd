@extends('Dizaji.ToDo.layout.layout')
@section('content')
    <form action="{{$task!=null ? '/create' : '/edit'}}" method="post">
        {{csrf_field()}}
        @if($task != null)
            <input hidden name="id" value="{{$task->id}}">
        @endif
        <div class="form-group">
            <label for="token">Token:</label>
            <textarea type="text" class="form-control" rows="2" id="token" placeholder="Enter token of user"
                      name="token">{{$task!=null ? trim($task->user->token) : null}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                   value="{{$task!=null ? trim($task->title) : null}}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" rows="5" id="description"
                      name="description">{{$task!=null ? trim($task->description) : null}}</textarea>
        </div>
        <div class="form-group">
            <label for="lables">Lables:</label>
            <textarea class="form-control" rows="5" placeholder="Seprate lables with ','" id="lables" name="lables">
                @if($task != null)
                    @foreach($task->lables()->get() as $lable)
                        {{trim($lable->lablename)}}
                    @endforeach
                @endif
            </textarea>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="status" value="1" {{$task!=null ? 'checked' : null}}>Status</label>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
