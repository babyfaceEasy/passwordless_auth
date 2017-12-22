<?php

namespace App\Auth\Traits;

use App\UserLoginToken;

use Mail;
use App\Mail\MagicMailRequested;

trait MagicallyAuthenticable
{
  public function token()
  {
    return $this->hasOne(UserLoginToken::class);
  }

  public function storeToken()
  {

    $this->token()->delete();

    $this->token()->create([
      'token' => str_random(191),
    ]);

    return $this;
  }

  public function sendMagicLink(array $options)
  {
    Mail::to($this)->send(new MagicMailRequested($this, $options));
  }
}//end of class
