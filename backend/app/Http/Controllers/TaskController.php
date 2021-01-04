<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Group;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    private $task;

    public function __construct(Task $task)
    {
        $this->middleware('auth');
        $this->task = $task;
    }



    //追加
    public function index(Task $task) {
      // $tasks = Task::all();
      $userId = Auth::user()->id;
      // $tasks = Task::where('user_id', $userId);
      // $tasks = $this->task->all();
      $tasks = $this->task->where('user_id', $userId)->get();
      // $groups = $this->group->all();
      $groups = Group::all();
      Log::debug($groups);
    // return view('task.index')->with('tasks',$tasks);
    return view('task.index', compact('tasks','groups'));
    }


    // public function __construct(Task $task){
    //
    // }
    //

    public function store(TaskRequest $request, Task $task) {
      // validation ここから追加
      // $rules = [
      //   'title' => 'required'
      // ];
      // $message = [
      //   'title.required' => ':attributeを入力してください。'
      // ];
      // $attr = ['title' => 'タスク'];
      // $this->validate($request, $rules, $message, $attr);
      // ここまで追加
      // $task = new Task();
      $task->title = $request->title;
      // $task->user_id = Auth::user()->id;
      $task->user_id = Auth::id();
      $task->group_id = $request->group;
      $task->save();
      return redirect('/');
    }

    public function destroy(Task $task){
      $task->delete();
      return redirect('/');
    }

    public function edit(Task $task){
      // return view('task.edit')->with('task',$task);
      return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task){
      // validation ここから追加
      // $rules = [
      //   'title' => 'required'
      // ];
      // $message = [
      //   'title.required' => ':attributeを入力してください。'
      // ];
      // $attr = ['title' => 'タスク'];
      // $this->validate($request, $rules, $message, $attr);
      // ここまで追加
      $task->title = $request->title;
      $task->save();
      return redirect('/');
    }

    // public function complete(Request $request, $id){
    //   Log::debug($request);
    //   $task = Task::find($id);
    //   $task->is_completed = $request[0];
    //   $task->save();
    //   // return redirect('/');
    // }

    public function complete(Request $request, $id){
      Log::debug($request);
      // Log::debug($task);
      // $task = Task::find($id);
      $task = $this->task->find($id);
      $task->is_completed = $request[0];
      $task->save();
      // return redirect('/');
    }


}
