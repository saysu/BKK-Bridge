<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/events';

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
     * Twitterの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Twitterからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            dd($user);
            $socialUser = User::firstOrCreate([
                'token'    => $user->token,
            ], [
                'token'    => $user->token,
                'name'     => $user->name,
                'email'    => $user->email,
                'image'   => $user->avatar_original,
                'introduction'   => $user->user['description'],
            ]);
            Auth::login($socialUser, true);
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        
        return redirect()->route('events.index');
    }
}
