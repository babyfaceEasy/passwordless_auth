<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserLoginToken extends Model
{
    //
    protected $table = 'users_login_tokens';

    const TOKEN_EXPIRY = 30;

    protected $fillable = [
      'token',
    ];

    public function isExpired()
    {
      return $this->created_at->diffInSeconds(Carbon::now()) > self::TOKEN_EXPIRY;
    }

    public function belongsToEmail($email)
    {
      return (bool) ($this->user->where('email', $email)->count() == 1);
    }

    public function getRouteKeyName()
    {
      return 'token';
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
