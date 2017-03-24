<?php

namespace LilyFlower\Http\Controllers\Auth;
use LilyFlower\User;
use Validator;
use Socialite;
use Auth;
use Exception;
use LilyFlower\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;


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
        $this->middleware('guest', ['except' => 'logout']);
    }
     public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
             $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }
        //dd($user);
        $authUser = $this->createUser($user);

        Auth::login($authUser,true);
        return redirect('home');
        // $user->token;

    }
    public function createUser($user){
        echo "1";
        $authUser = User::where('google-id',$user->id)->first();
        if($authUser){
            return $authUser;
        }
        return User::create([
            'name'=>$user->name,
            'google-id'=>$user->id,
            'email'=>$user->email,
            'avatar'=>$user->avatar,]);
    }
}
