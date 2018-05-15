<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
  public function index()
  {

      $players = \App\User::paginate(5);

      if (\Request::ajax()) {
          return \Response::json(\View::make('partials.players', array('players' => $players))->render());
      }

      return view('players.index',compact('players'));

  }
}
