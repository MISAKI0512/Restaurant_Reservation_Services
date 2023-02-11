<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindMail;

class reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reminder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::with('user', 'shop')->get();
        foreach ($reservations as $reservation) {
            $reservationTime = $reservation->start_at->format('Y-m-d');
            //予約の日付と同じ日の場合はメール送信
            if ($reservationTime == date("Y-m-d")) {
                Mail::send(new RemindMail($reservation));
            }
        }
    }
}
