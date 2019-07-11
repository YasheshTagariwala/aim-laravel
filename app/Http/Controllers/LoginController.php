<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use DB;
use Hash;
use Session;
use Mail;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function redirectToProvider($provider)
    {
        if($provider != 'twitter'){
            return Socialite::driver($provider)->stateless()->redirect();
        }
        else{            
            return Socialite::driver($provider)->redirect();
        }
    }
    
    public function handleProviderCallback($provider)
    {
        if($provider != 'twitter'){
            $user = Socialite::driver($provider)->stateless()->user();
        }
        else{            
            $user = Socialite::driver($provider)->user();
        }

        // All Providers
        $user->getId();
        $dname = $user->getNickname();
        $uname = $user->getName();
        $email = $user->getEmail();
        $user->getAvatar();
        $email_check = DB::table('userdetails')->where('email',$email)->get();

        if(count($email_check) < 1){
            Session::put('login_by',$email_check[0]->email);
            Session::put('userid',$email_check[0]->id);
            Session::put('firstname',$email_check[0]->firstname);
            Session::put('lastname',$email_check[0]->lastname);
            Session::put('useremail',$email_check[0]->email);
            Session::put('username',$email_check[0]->username);
            Session::put('groupid',$email_check[0]->groupid);
            Session::put('provider',$email_check[0]->provider);
            Session::put('is_login','1');

            return redirect('/');

        }
        else{

            return redirect('/login');
        }

        return view('home.s-register',compact('dname','uname','email'));
    }

}
