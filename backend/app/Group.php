<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function task(){
    // return $this->hasMany('App\Task');
    // return $this->hasMany(Task::class, 'user_id');
    return $this->hasMany(Task::class);
  }
    //
}
