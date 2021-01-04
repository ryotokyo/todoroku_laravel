@extends('layout.common')

@section('title', 'TODO録')
@section('pageTitle', 'TODO録')
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
      <form action="{{url('/task')}}" method="post">
        {{csrf_field()}}
      <div class="form-group">
      <h2 class="font-weight-bold">タスクを追加</h2>
        <input type="text" name="title" class="form-control" placeholder="タスクを追加してください">
      </div>
      <div class="form-group">
        <h5>グループを選択</h5>
        <select class="form-control col-3" name="group">
            <option value="0">未選択</option>
          @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->group_name}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">ADD</button>
      </form>
    </div>
    <div class="container">
      <h2 class="todoTable__title font-weight-bold">TODOリスト</h2>
      <table class="table table-striped">
        <thead>
          @if($tasks=='[]')
          @else
          <tr>
            <th>完了</th>
            <th>タスク</th>
            <th>グループ</th>
            <th>名前</th>
            <th></th>
            <th></th>
          </tr>
          @endif
        </thead>
        <tbody>
          @forelse($tasks as $task)
          <tr>
            <!-- チェックボックス -->
            <td class="pl-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="aaaa custom-control-input" name="check" id="{{$task->id}}" value="{{$task->is_completed}}" data-id="{{$task->id}}" data-completed="{{$task->is_completed}}">
                <label class="custom-control-label" for="{{$task->id}}"></label>
              </div>
            </td>
            <td>{{$task->title}}</td>
            <td>
              {{ optional($task->group)->group_name }}
            </td>
            <td>
              {{ optional($task->user)->name }}
            </td>
            <td>
              <form action="{{route('task.edit', $task)}}" method="post">
              {{ csrf_field() }}
              {{ method_field('get') }}
              <button type="submit" class="btn btn-primary">編集</button>
              </form>
            </td>
            <td>
              <a class="del btn btn-danger" data-id="{{ $task->id }}" href="#">削除</a>
              <form method="post" action='{{ url('/task', $task->id) }}' id="form_{{ $task->id}}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
              </form>
            </td>
          </tr>
          @empty
            <p>登録されているタスクがありません。</p>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
@endsection

@include('layout.footer')

@section('javascript')
  <script src="{{ asset('/js/javascript.js')}}"></script>
@endsection

