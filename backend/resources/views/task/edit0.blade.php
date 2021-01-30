<!doctype html>
<html lang="ja">
  <head>
    <title>ToDo録</title>
  <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>

  <body>
  <header>
    <h1 class="font-weight-bold">ToDoリスト更新</h1>
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
      <form action="{{ url('task', $task->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group">
          <label>タスクを更新してください</label>
          <input type="text" name="title" class="form-control" value="{{ $task->title }}">
        </div>
        <button type="button" onclick="history.back()" class="btn btn-secondary">戻る</button>
        <button type="submit" class="btn btn-primary">更新</button>
      </form>
    </div>
  </main>
  <footer>
  </footer>
  <!-- オプションのJavaScript -->
  <!-- 最初にjQuery、次にPopper.js、次にBootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>
