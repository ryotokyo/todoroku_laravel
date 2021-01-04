<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
  use SoftDeletes;

  public function user(){
    // return $this->belongsTo('App\User');
    // return $this->belongsTo(User::class, 'user_id');
    return $this->belongsTo(User::class);
  }

  public function group(){
    // return $this->belongsTo('App\User');
    // return $this->belongsTo(User::class, 'user_id');
    return $this->belongsTo(Group::class);
  }

    //
}
