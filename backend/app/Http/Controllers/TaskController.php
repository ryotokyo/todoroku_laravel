<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //追加
    public function index() {
      $tasks = Task::all();
    return view('task.index')->with('tasks',$tasks);
    }

    public function store(Request $request) {
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

    public function complete(Request $request, task $task){
      $task->is_completed = $request->check;
      $task->save();
      return redirect('/');
    }


}
