<?php

namespace StaffApp\Http\Controllers\api;

use Illuminate\Http\Request;

use StaffApp\User;

use StaffApp\Http\Requests;

use StaffApp\Http\Controllers\Controller;

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
            return json_encode(array('status' => false,'msg'=>"Questa email è già registrata con un utente!"));
        }

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->token = $request->get('remember_token');
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return json_encode(array('status' => true,'user' => $user ,'msg' => "Registrazione OK!"));
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
            $user->token = $request->get('remember_token');
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
}
