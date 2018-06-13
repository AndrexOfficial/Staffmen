<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

use App\Event;

use App\EventMember;

use App\Job;

use App\Http\Requests;

use Illuminate\Support\Facades\Validator;

use Illuminate\Mail\Message;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Password;



class ApiController extends Controller {

    // use JsonResponce;

    public function __construct() {
        
    }

    public function signup(Request $request){

        $validator = Validator::make($request->all(), [
                    'name'     => 'required',
                    'email' => 'required|email',
                    'password' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg' => $messages));
        }

        $usercheck = User::where('email', $request->get('email'))->count();
        if ($usercheck > 0) {
            return json_encode(array('status' => false,'msg'=>"This email id already exist with us!"));
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return json_encode(array('status' => true,'user' => $user ,'msg' => 'Registered Successfully!'));                
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg' => $messages));
        }
        $credentials = $request->only(['email', 'password']);
        $email_count = User::where('email', $request->get('email'))->count();
        
        if($email_count==0){
            return json_encode(array('status' => false,'msg' => "Email does not exists."));
        }

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return json_encode(array('status' => true,'user' => $user,'msg' => "Login successfully"));
        }
        else{
           return json_encode(array('status' => false,'msg'=>"Incorrect Email or Password"));
        }         
    }

    public function forget(Request $request){
        // $this->validate($request, [
        //     'email' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    ]);
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg' => $messages));
        }
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return json_encode(array('status' => false,'msg' => 'Email can not be empty!'));
        } else {
            // $to = $user->email;
            // $name = $user->name;
            // $subject = 'Password Reset';
            // $code = str_random(30);
            // $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                        $message->subject('Password Reset');
                        $message->sender('support@ns7records.com');
            });

            if($response){
                return json_encode(array('status' => true,'msg'=>"Password Reset Email Sent Succesfully"));    
            }
            else{
                return json_encode(array('status' => false,'msg'=>"Mail could not be sent"));    
            }
            
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null){
        return view('auth.passwords.reset')->with('token', $token);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function postReset(Request $request){
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    ]);
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg' => $messages));
        }
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return json_encode(array('status' => false,'msg' => 'Email can not be empty!'));
        } else {
            // $to = $user->email;
            // $name = $user->name;
            // $subject = 'Password Reset';
            // $code = str_random(30);
            // $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

            $response = Password::sendResetLink($request->only('email'), function (Message $message) {
                        $message->subject('Password Reset');
                        $message->sender('support@ns7records.com');
            });

            if($response){
                return json_encode(array('status' => true,'msg'=>"Password Reset Email Sent Succesfully"));    
            }
            else{
                return json_encode(array('status' => false,'msg'=>"Mail could not be sent"));    
            }
            
        }
    }

    // Event Api start

    public function createevent(Request $request) {

        $validator = \Validator::make($request->all(), [
                    // 'job' => 'required|integer',
                    'members_total' => 'required|integer',
                    'members_confirmed' => 'required|integer',
                    'local' => 'required',
                    'event_date' => 'required|date',
                    'time_start' => 'required|date_format:H:i',
                    'time_end' => 'required|date_format:H:i',
                    'cost' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg'=>$messages));    
        }

        $item = new \App\Event;
        $item->user_id =$request->user_id;
        $item->job_id = $request->job_id;
        $item->num_members = $request->members_total;
        $item->num_members_confirmed = $request->members_confirmed;
        $item->local = $request->local;
        $item->date = \Carbon\Carbon::parse($request->event_date);
        $item->time_start = $request->time_start;
        $item->time_end = $request->time_end;
        $item->cost = $request->cost;
        $item->status = $request->status;
        if ($request->title) {
            $item->title = $request->title;
        }
        if ($request->description) {
            $item->description = $request->description;
        }
        $item->save();
        return json_encode(array('status' => true,'msg'=>"Evento pubblicato correttamente!"));    
    }

    public function getevents(Request $request){
        $events = Event::where('id',$request->id)->get();
    }
    public function editevent(Request $request) {

        $validator = \Validator::make($request->all(), [
                    'id'    =>  'required|integer',
                    'job_id' => 'required|integer',
                    'members_total' => 'required|integer',
                    'members_confirmed' => 'required|integer',
                    'local' => 'required',
                    'event_date' => 'required|date',
                    'time_start' => 'required|date_format:H:i',
                    'time_end' => 'required|date_format:H:i',
                    'cost' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg'=>$messages));    
        }

        $item = Event::find($request->id);

        if(count($item)>0){
            $item->job_id = $request->job_id;
            $item->num_members = $request->members_total;
            $item->num_members_confirmed = $request->members_confirmed;
            $item->local = $request->local;
            $item->date = \Carbon\Carbon::parse($request->date);
            $item->time_start = $request->time_start;
            $item->time_end = $request->time_end;
            $item->cost = $request->cost;
            $item->status = $request->status;
            if ($request->title) {
                $item->title = $request->title;
            }
            if ($request->description) {
                $item->description = $request->description;
            }
            $item->save();
            return json_encode(array('status' => true,'msg'=>"Evento aggiornato correttamente!"));
        }
        else{
            return json_encode(array('status' => false,'msg'=>"Evento not exists!"));   
        }

           
    }
    public function deleteevent(Request $request) {

        $event = Event::find($request->id);

        if($event) {
            $event->delete();
            return json_encode(array('status' => true,'msg'=>"Event deleted succesfully!")); 
        }        
        else{
            return json_encode(array('status' => false,'msg'=>"Event not exists!")); 
        }
        
    }

    public function joinevent(Request $request) {

        $event = \App\Event::find($request->id);
        if ($event) {
            $join = new \App\EventMember;
            $join->user_id = $request->user_id;
            $join->event_id = $event->id;
            $join->type = 1;
            $join->save();

            return json_encode(array('status' => true,'msg'=>'Swoosh! La tua richiesta è stata inviata')); 
        }
    }

    public function disjoinevent(Request $request) {

        $event = \App\EventMember::find($request->id);
        if($event) {
            $event->delete();
            return json_encode(array('status' => true,'msg'=>"User removed from Event succesfully!")); 
        }        
        else{
            return json_encode(array('status' => false,'msg'=>"Event not exists!")); 
        }
    }
}
