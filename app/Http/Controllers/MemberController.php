<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
  public function index()
  {

      $members = \App\User::paginate(5);

      if (\Request::ajax()) {
          return \Response::json(\View::make('partials.members', array('members' => $members))->render());
      }

      return view('members.index',compact('members'));

  }
}
