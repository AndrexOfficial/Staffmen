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
            return json_encode(array('status' => false,'msg'=>"Questa email è già registrata con un utente"));
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return json_encode(array('status' => true,'user' => $user ,'msg' => "Registrazione OK"));                
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
            return json_encode(array('status' => false,'msg' => "L'email inserita non è assegnata ad un utente esistente"));
        }

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            return json_encode(array('status' => true,'user' => $user,'msg' => "Login OK"));
        }
        else{
           return json_encode(array('status' => false,'msg'=>"Email o Password non corretti"));
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
            return json_encode(array('status' => false,'msg' => "L'email non può essere vuota!"));
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
                return json_encode(array('status' => true,'msg'=>"L'email di reset password è stata inviata con successo"));
            }
            else{
                return json_encode(array('status' => false,'msg'=>"L'email di reset non può essere inviata"));
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
                return json_encode(array('status' => true,'msg'=>"L'email di reset password è stata inviata con successo"));
            }
            else{
                return json_encode(array('status' => false,'msg'=>"L'email di reset non può essere inviata"));
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
                    'time_start' => 'required',
                    'time_end' => 'required',
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
        if ($request->event_photo){
            
            if($item->event_photo!=''){
                $path = 'public/images/event_covers/' . $item->event_photo;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = time() . '.' . $request->event_photo->getClientOriginalExtension();
            $request->event_photo->move(public_path('images/event_covers/'), $image);
            $url = 'public/images/event_covers/' . $image;
            $item->event_photo = $url;
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
            if ($request->event_photo){
                
                if($item->event_photo!=''){
                    $path = 'public/images/event_covers/' . $item->event_photo;
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $image = time() . '.' . $request->event_photo->getClientOriginalExtension();
                $request->event_photo->move(public_path('images/event_covers/'), $image);
                $url = 'public/images/event_covers/' . $image;
                $item->event_photo = $url;
            }
            $item->save();
            return json_encode(array('status' => true,'msg'=>"Evento aggiornato correttamente!"));
        }
        else{
            return json_encode(array('status' => false,'msg'=>"Evento non esistente!"));
        }

           
    }
    public function deleteevent(Request $request) {

        $event = Event::find($request->id);

        if($event) {
            $event->delete();
            return json_encode(array('status' => true,'msg'=>"Evento cancellato con successo!"));
        }        
        else{
            return json_encode(array('status' => false,'msg'=>"Evento non esistente!"));
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
            return json_encode(array('status' => true,'msg'=>"Utente rimosso dall'evento con successo!")); 
        }        
        else{
            return json_encode(array('status' => false,'msg'=>"Evento non esistente!"));
        }
    }

    public function profile(Request $request){
        $validator = \Validator::make($request->all(), [
            'id'    =>  'required|integer',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg'=>$messages));    
        }
        $user = \App\User::find($request->id);

        return json_encode(array('status' => true,'data'=>$user)); 

    }
    //Profile API
    public function profileupdate(Request $request){

        // return dd($request->all());

        $validator = \Validator::make($request->all(), [
                    'name' => 'required',
        ]);

        if($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return json_encode(array('status' => false,'msg'=>$messages));    
        }

        $user = User::find($request->user_id);
        $user->name = $request->name;

        if($request->location){
            $user->location = $request->location;
        }

        // if($request->jobs){
        //     foreach ($request->jobs as $job) {
        //         $user->jobs()->attach($job);
        //     }
        // }
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

        if ($request->cv!=''){
            // $image = time() . '.' . $request->cv->getClientOriginalExtension();
            // $request->cv->move(public_path('images'), $image);
            // $url = 'public/images/curriculum/' . $image;
            // $user->resume = $url;
            // $img = str_replace('data:image/png;base64,', '', $request->cv);
            // $img = str_replace(' ', '+', $img);
            $data = base64_decode($request->cv);

            $file_cv_name = uniqid() . '.jpg';
            $file = public_path('images/curriculum/'). $file_cv_name;

            // imagejpeg($data,$file,50);

            touch($file);
            chmod($file, 0775);
            $file1 = fopen($file, 'w');
            fwrite($file1, $data);
            fclose($file1);
            $user->resume = $file_cv_name;
        }        
        if ($request->photo!=''){
            // $image = time() . '.' . $request->photo->getClientOriginalExtension();
            // $request->photo->move(public_path('images'), $image);
            // $url = 'public/images/' . $image;
            // $user->photo = $url;
            // $img = str_replace('data:image/png;base64,', '', $request->photo);
            // $img = str_replace(' ', '+', $img);
            $data = base64_decode($request->photo);
            $file_photo_name = uniqid() . '.jpg';
            $file = public_path('images/'). $file_photo_name;
            touch($file);
            chmod($file, 0775);
            $file1 = fopen($file, 'w');
            fwrite($file1, $data);
            fclose($file1);
            $user->photo = $file_photo_name;
        }

        $user->save();

        if($user) {
            return json_encode(array('status' => true,'msg'=>"Evvai! Profilo aggiornato correttamente")); 
        }        
        else{
            return json_encode(array('status' => false,'msg'=>"Profilo non esistente!"));
        }
        
    }
}
