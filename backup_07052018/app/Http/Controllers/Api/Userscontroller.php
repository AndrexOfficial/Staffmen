<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

use Illuminate\Mail\Message;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Password;



class Userscontroller extends Controller {

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
}
