<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$title,$contents)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $title;
        $this->contents = $contents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
                    ->from('admin@example.com','RESE管理人')
                    ->subject($this->subject)
                    ->view('mail')
                    ->with(['name' => $this->name,'contents' => $this->contents]);
    }


}
