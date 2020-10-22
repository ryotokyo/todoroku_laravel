<!doctype html>
<html lang="ja">
  <head>
    <title>ToDo録</title>
  <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
  <header>
    <h1 class="top__title">TODO録</h1>
  </header>
  <main>
    <div class="todoAdd__container">
      <h2 class="title">ToDoを追加する</h2>
      <form action="{{url('/task')}}" method="post">
        {{csrf_field()}}
      <div class="todoAdd__form">
        <input type="text" name="title" class="formField" placeholder="ToDoを追加してください">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
    <div class="todoTable__container">
      <h2 class="title">ToDoリスト</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>完了</th>
            <th>タスク</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($tasks as $task)
          <tr>
            <!-- チェックボックス -->
            <td>
              <form action="{{ url('/complete', $task)}}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="check" value="{{$task->is_completed}}">
              <input type="checkbox" name="check" onclick="this.form.check.value=this.checked ? 1 : 0" >
              </form>
            </td>

            <td>{{$task->title}}</td>

            <!-- 編集ボタン -->
            <td>
              <form action="{{action('TaskController@edit', $task)}}" method="post">
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
          @endforeach
        </tbody>
      </table>



    </div>
  </main>
  <footer>
  </footer>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/javascript.js')}}"></script>

  </body>
</html>