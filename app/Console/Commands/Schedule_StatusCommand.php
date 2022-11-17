<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Models\Notifi;
use App\Models\Schedule;
use App\Notifications\SendmailNotifi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Schedule_StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thông báo lịch học đã được sửa';


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
       $schedule = Schedule::where('status',-1)->get();
       if(count($schedule) > 0) {
        foreach($schedule as $item) {
            $notifi = new Notifi();
            $notifi->subject_id = $item->subject_id;
            $notifi->room_id = $item->room_id;
            $notifi->title = 'Môn học vừa được thay đổi lịch';
            $notifi->save();
            // $item->notify(new SendmailNotifi());
            $message = [
                'title' => 'Lịch môn học',  
                'subject' => $item->subject->name,
                'room' => $item->room->name,
            ];
            Mail::to($item->admin->email)->queue(new SendMail($message));  
        }
       }
       if(count($schedule) == 0) {
        echo "Môn học không có sự thay đổi lịch";
       }
    }
}
