<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagicLoginController extends Controller
{
    //

    public function show(Request $request){
      return view('auth.magic.login');
    }//end of show()
}
