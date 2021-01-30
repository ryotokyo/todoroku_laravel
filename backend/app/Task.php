<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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


  // public function getLoginUserTasks($groupId=null){
  //
  //   $userId = Auth::user()->id;
  //
  //   $params = ['user_id'=>$userId];
  //
  //   if($groupId) {
  //     $params['group_id'] = $groupId;
  //   }
  //
  //   return $this->where($params)->get();
  //
  // }

  public function scopeUserId($query, $userId){
    // dd($userId);
    // $userId = Auth::user()->id;

    // Log::debug($userId);
    return $query->where('user_id', $userId);

  }

    public function scopeGroupId($query, $groupId){
      // dd($query);
      if(!$groupId) return $query;
      // dd($groupId);

      // dd($query->where('group_id', $groupId));
      return $query->where('group_id', $groupId);



  }

    //
}
