<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventMessage extends Model
{

  protected $table='event_message';

  public function user()
  {
        return $this->belongsTo('App\User');
  }

}
