<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    /* @var string $name */
    private $name;

    /* @var int $name */
    private $id;

    /* @var string $token */
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, int $id, string $token)
    {
        $this->name = $name;
        $this->id = $id;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->markdown('emails.verifyAccount', [
            'name' => $this->name,
            'id' => $this->id,
            'token' => $this->token,
        ]);
    }
}
