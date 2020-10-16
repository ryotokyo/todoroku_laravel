<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //追加
    public function index() {
      $task = Task::all();
    return view('task.index')->width('task',$task);
    }
}
