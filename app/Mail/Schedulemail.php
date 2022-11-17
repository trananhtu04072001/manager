<?php

namespace App\Mail;

use App\Models\Schedule;
use App\Models\Test_schedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Schedulemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $schedule = Schedule::with(['admin:id,name','subject:id,name','room:id,name'])->where('status',1)->get();
        $test_schedule = Test_schedule::with(['admin:id,name','subject:id,name','room:id,name'])->where('status',1)->get();
        return $this->view('email.schedulemail',[
            'schedule' => $schedule,
            'test_schedule' => $test_schedule,
        ]);
    }
}
