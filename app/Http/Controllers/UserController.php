<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    public function profile(){
        return view('user.profile');
    }

    public function profile_member($id){
        $member = \App\User::find($id);
        // echo "<pre>";
        // print_r($member);
        // exit;
        return view('user.profile_member', compact('member'));
    }

    public function profile_edit(){
        return view('user.profile_edit');
    }

    public function requests(){
        return view('user.requests');
    }

    public function invites(){
        return view('user.invites');
    }

    public function markallasread(){
        \Auth::user()->unreadNotifications->markAsRead();
        return back();
    }

    public function profile_update(Request $request){

        // return dd($request->all());

        $validator = \Validator::make($request->all(), [
                    'name' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = \Auth::user();
        $user->name = $request->name;

        if($request->location){
            $user->location = $request->location;
        }

        if($request->jobs){
            foreach ($request->jobs as $job) {
                $user->jobs()->attach($job);
            }
        }
        $user->age = $request->age;
        $user->phone_number = $request->phone;
        $user->sex = $request->sex;
        $user->descr = $request->descr;
        $user->prev_job = $request->job;
        $user->tshirt_size = $request->tshirt_size;
        $user->height = $request->height;
        $user->hair = $request->hair;
        $user->shoes_size = $request->shoes_size;
        $user->eyes = $request->eyes;
        

        if ($request->cv){
            $image = time() . '.' . $request->cv->getClientOriginalExtension();
            $request->cv->move(public_path('images'), $image);
            $url = '/images/curriculum/' . $image;
            $user->resume = $url;
        }        
        if ($request->photo){
            $image = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('images'), $image);
            $url = '/images/' . $image;
            $user->photo = $url;
        }
        if ($request->cover_photo){
            $image = time() . '.' . $request->cover_photo->getClientOriginalExtension();
            $request->cover_photo->move(public_path('images'), $image);
            $url = '/images/cover/' . $image;
            $user->cover_photo = $url;
        }
        $user->save();
        return redirect('/profile')->with('success', 'Evvai! Profilo aggiornato correttamente');
    }

}
