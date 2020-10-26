<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    //追加
    public function index() {
      $tasks = Task::all();
    return view('task.index')->with('tasks',$tasks);
    }

    public function store(Request $request) {
      // validation ここから追加
      $rules = [
        'title' => 'required'
      ];
      $message = [
        'title.required' => ':attributeを入力してください。'
      ];
      $attr = ['title' => 'タスク'];
      $this->validate($request, $rules, $message, $attr);
      // ここまで追加
      $task = new Task();
      $task->title = $request->title;
      $task->save();
      return redirect('/');
    }

    public function destroy(task $task){
      $task->delete();
      return redirect('/');
    }

    public function edit(task $task){
      return view('task.edit')->with('task',$task);
    }

    public function update(Request $request, task $task){
      $task->title = $request->title;
      $task->save();
      return redirect('/');
    }

    public function complete(Request $request, $id){
      Log::debug($request);
      $task = Task::find($id);
      $task->is_completed = $request[0];
      $task->save();
      // return redirect('/');
    }


}
