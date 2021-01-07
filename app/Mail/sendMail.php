<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = $this->data['data']['info'];
        // dd($this->data['data']['info']['user']->name);

        return $this->from($this->data['data']['from'], $this->data['data']['from_name'])
            ->subject($this->data['data']['subject'])
            ->view($this->data['data']['template'],compact('info'))
       ;
    }
}
