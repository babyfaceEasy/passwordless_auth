<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Auth\MagicAuthentication;
use App\Http\Controllers\Controller;
use App\UserLoginToken;

class MagicLoginController extends Controller
{
    //

    protected $redirectOnrequest = '/login/alt';
    public function show(Request $request){
      return view('auth.magic.login');
    }//end of show()

    public function sendToken(Request $request, MagicAuthentication $auth)
    {
        $this->validateLogin($request);
        $auth->requestLink();
        return redirect()->to($this->redirectOnrequest)->with('success', 'We\'av sent you a magic link.');

    }//end of sendToken()

    protected function validateLogin(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email|max:255|exists:users,email',
      ]);
    }

    public function validateToken(Request $request, UserLoginToken $token)
    {
      //dd($token);

      $token->delete();

      //checks

      if($token->isExpired()){
        return redirect('/login/alt')->with('error', 'The magic link has expired.');
      }

      if (!$token->belongsToEmail($request->email)) {
        return redirect('/login/alt')->with('error', 'Invalid magic link.');
      }

      Auth::login($token->user, $request->remember);

      //return redirect()->intended();
      return redirect('/home');
    }
}
