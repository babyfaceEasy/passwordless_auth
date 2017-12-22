<?php

namespace App\Mail;

use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MagicMailRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $options;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, array $options)
    {
        $this->user = $user;
        $this->options = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->user->token->token);
        return $this->subject('Your magic login link')->view('email.auth.magic.link')->with([
          'link' => $this->buildLink(),
        ]);
        //return $this->view('view.name');
    }

    protected function buildLink()
    {
      //return url('/login/alt/'. $this->user->token . '?' . http_build_query($this->options));
      return url('/login/alt/'. $this->user->token->token. '/?' . http_build_query($this->options));
    }
}
