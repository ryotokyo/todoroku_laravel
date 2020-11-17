<!doctype html>
<html lang="ja">
  <head>
    <title>TODO録</title>
  <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
  </head>

  <body>
  <header>
    <h1 class="font-weight-bold">TODO録</h1>
  </header>
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
      <h2 class="font-weight-bold">タスクを追加</h2>
      <form action="{{url('/task')}}" method="post">
        {{csrf_field()}}
      <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="タスクを追加してください">
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
              <!-- <input type="hidden" name="check" value="{{$task->is_completed}}">
              <input type="checkbox" name="check" onclick="this.form.check.value=this.checked ? 1 : 0" > -->

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="aaaa custom-control-input" name="check" id="{{$task->id}}" value="{{$task->is_completed}}" data-id="{{$task->id}}" data-completed="{{$task->is_completed}}">
                <label class="custom-control-label" for="{{$task->id}}"></label>
              </div>

              <!-- {{$task->is_completed == '1' ? 'checked' : '' }} -->

              <!-- <script>
              if($("#{{$task->id}}").prop('checked')){
                $("#{{$task->id}}").closest("tr").css("text-decoration", "line-through");
              };
              </script> -->

              <!-- <script>
              var checkedId = $("#{{$task->id}}").attr('id')
              var finishFlag = $("#{{$task->id}}").val();
              console.log(checkedId);
              console.log(finishFlag);

              if(finishFlag === "1" ){
                $("#{{$task->id}}").prop("checked", true);
                $("#{{$task->id}}").closest("tr").css("text-decoration", "line-through");
              };
              </script> -->

            </td>

            <td>{{$task->title}}</td>

            <!-- 編集ボタン -->
            <td>
              <!-- <form action="{{action('TaskController@edit', $task)}}" method="post"> -->
              <form action="{{route('task.edit', $task)}}" method="post">

              {{ csrf_field() }}
              {{ method_field('get') }}
              <button type="submit" class="btn btn-primary">編集</button>
              </form>
            </td>

            <!-- 削除ボタン -->
            <!-- <td>
              <form action="{{url('/task',$task->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
              <button type="submit" class="btn btn-danger">削除</button>
              </form>
            </td> -->

            <!-- 削除した際にポップ画面で確認をする -->
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
  <footer>
    <!-- {{$tasks}} -->
  </footer>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/javascript.js')}}"></script>

  </body>
</html>
