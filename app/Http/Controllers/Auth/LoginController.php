<?php

namespace App\Http\Controllers\Auth;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Tymon\JWTAuth\Exceptions\JWTException;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        try {
            if(! $token = \JWTAuth::attempt($credentials)){
                return response()->json(['error'=>'invalid_credentials'],401);
            }
        } catch(JWTException $e){
            return response()->json(['error'=>'failed_to_create_token'],500);
        }

        $user = User::where('email', $request['email'])->get()->first();
        $user = array(
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name
        );
        return response()->json(compact('token','user'));


           
    }

}