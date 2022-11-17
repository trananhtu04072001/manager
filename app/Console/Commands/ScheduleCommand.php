<?php

namespace App\Console\Commands;

use App\Models\Notifi;
use App\Models\Subject_status;
use App\Responsitory\Subject_statusResponsitory;
use Illuminate\Console\Command;

class ScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lịch thi mới';


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
        echo 'helo';
        $status = Subject_status::where('hour',0)->where('active',0)->get();
        echo "helo";
        if(count($status) > 0) {
        foreach($status as $item) {
        $notfi = new Notifi();
        $notfi->subject_id = $item->subject_id;
        $notfi->room_id = $item->room_id;
        $notfi->title = 'Giáo vụ lên lịch thi';
        $notfi->save();

        $update = Subject_status::find($item->id);
           $update->active = 1;
           $update->save();
        }
    }
    if(count($status) <= 0) {
        echo "Không có lịch mới ";
    }
    }

}
