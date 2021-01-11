<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\GroupRequest;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
  private $group;

  public function __construct(Group $group)
  {
      $this->middleware('auth');
      $this->group = $group;
  }



  public function store(GroupRequest $request, Group $group) {
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
    $group->name = $request->name;
    $group->save();
    return redirect('/');
  }
    //
}
