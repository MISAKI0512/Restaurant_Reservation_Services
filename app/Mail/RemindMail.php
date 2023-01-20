<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->name = $reservation->user->name;
        $this->email = $reservation->user->email;
        $this->subject='[案内] 予約日当日のお知らせ';
        $this->reservation=$reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->from('admin@example.com', 'RESE管理人')
            ->subject($this->subject)
            ->view('remind')
            ->with(['name' => $this->name, 'reservation' => $this->reservation]);
    }
}
