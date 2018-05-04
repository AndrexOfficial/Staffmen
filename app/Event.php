<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

  public function user()
  {
        return $this->belongsTo('App\User');
  }

  public function job()
  {
        return $this->belongsTo('App\Job');
  }

  public function members()
  {
        return $this->hasMany('App\EventMember');
  }

  public function messages()
  {
        return $this->hasMany('App\EventMessage');
  }

  public function attending()
  {
        return $this->hasMany('App\EventMember')->where('state',1);
  }

}
