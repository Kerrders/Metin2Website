<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LostPassword extends Mailable
{
    use Queueable, SerializesModels;

    /* @var string $name */
    private $name;

    /* @var string $newPassword */
    private $newPassword;

    /**
     * Create a new message instance.
     * 
     * @param string $name
     * @param string $newPassword
     *
     * @return void
     */
    public function __construct(string $name, string $newPassword)
    {
        $this->name = $name;
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
        ->markdown('emails.lostPassword', [
            'name' => $this->name,
            'newPassword' => $this->newPassword,
        ]);
    }
}
