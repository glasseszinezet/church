<?php

namespace App\Mail;

use App\Church;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notifications extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    protected $memberName;

    /**
     * Create a new message instance.
     *
     * @param $memberName
     * @param $message
     */
    public function __construct($memberName, $message)
    {
        $this->memberName = $memberName;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \Log::debug($this->message);
        return $this->view("mails.notifications")->with(["churchDetails" => Church::findOrFail(1), "member" => $this->memberName, "mail_message" => $this->message ]);
    }
}
