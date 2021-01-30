@extends('layout.common')

@section('title', 'TODO更新')
@section('pageTitle', 'ToDoリスト更新')
@section('content')
  <main>
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <div class="container">
      <form action="{{ url('task', $task->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <label>タスクを更新してください</label>
          <input type="text" name="title" class="form-control" value="{{ $task->title }}">
        </div>
        <div class="form-group">
          <label>グループを更新してください</label>
          <select class="form-control" name="group">
            <option value="0">未選択</option>
            @foreach($groups as $group)
              @if($group->id === $groupSelected)
                <option value="{{$group->id}}" selected="selected">{{$group->name}}</option>
              @else
                <option value="{{$group->id}}">{{$group->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
        <button type="button" onclick="history.back()" class="btn btn-secondary">戻る</button>
        <button type="submit" class="btn btn-primary">更新</button>
      </form>
    </div>
  </main>
@endsection

@include('layout.footer')
