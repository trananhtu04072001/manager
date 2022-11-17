<?php

namespace App\Console\Commands;

use App\Models\Again_detail;
use App\Models\Student;
use Illuminate\Console\Command;

class Learn_againCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'learn_again:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Thêm sinh viên học lại';

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
        $again = Again_detail::where('status',1)->get();
        if(count($again) > 0) {
            for($i = 0 ; $i < count($again) ; $i++) {
                $student = new Student();
                $student->student_code = $again[$i]->student->student_code;
                $student->name = $again[$i]->student->name;
                $student->email = $again[$i]->student->email;
                $student->phone = $again[$i]->student->phone;
                $student->address = $again[$i]->student->address;
                $student->room_id = '5';
                $student->course_id = '3';
                $student->save();
            }
        }
    }
}
