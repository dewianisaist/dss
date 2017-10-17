<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    // protected $username = 'identity_number';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        // $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function authenticate()
    {
        // $validator = Validator::make($request->all(), [
        //     'identity_number' => 'required|max:20|unique:users',
        //     'password' => 'required|min:6|confirmed',
        // ]);
        // if ($validator->fails()) {
        //     return response()->validationFailed($validator->message());
        // } else {
        //     $identity_number = $request->input('identity_number');
        //     $password = $request->input('password');

        //     $credentials =['identity_number' => $identity_number, 'password' => $password];
        //     $auth = Auth::attempts($credentials);
        // }
        // if($auth){
            
        // }
        if (Auth::attempt([
            'identity_number' => $identity_number, 
            'password' => $password])) {
            var_dump($identity_number); exit();
            // Authentication passed...
            return redirect()->intended('home');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:100',
            'identity_number' => 'required|max:20|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'identity_number' => $data['identity_number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
