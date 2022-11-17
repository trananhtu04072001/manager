<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\Tuition_course;
use App\Models\Tuition_student;
use Illuminate\Console\Command;

class TuitionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tuition:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Học phí học viên';

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
        $tuition = Tuition_course::get();
        $student = Student::get();
        for($i = 0 ; $i < count($student) ; $i++) {
            for($k = 0 ; $k < count($tuition) ; $k++) {
                if($tuition[$k]->course_id == $student[$i]->course_id && $tuition[$k]->major_id == $student[$i]->room->major_id)
                {
                    $update_count = Tuition_student::where('student_id',$student[$i]->id)->get();
                    $tuition_detail = new Tuition_student();
                    $tuition_detail->title = 'Học phí đợt';
                    $tuition_detail->student_id = $student[$i]->id;
                    $tuition_detail->tuition_id = $tuition[$k]->id;
                    // dd(count($update_count));
                    if(count($update_count) > 0) {
                        $m = count($update_count)-1;
                        if($update_count[$m]->count < 30) {
                        $tuition_detail->payment = $update_count[$m]->payment;
                        // $tuition_detail->total = (($tuition[$k]->tuition)*30) - $update_count[$m]->payment;
                        $tuition_detail->total = $update_count[$m]->total;
                        $tuition_detail->count = $update_count[$m]->count;
                        }
                        if($update_count[$m]->status == 2) {
                            $tuition_detail->payment = $update_count[$m]->payment;
                            $tuition_detail->total = $update_count[$m]->total;
                            $tuition_detail->count = $update_count[$m]->count;
                            $tuition_detail->status = 2;
                        }
                        if($update_count[$m]->count > 30 && $update_count[$m]->total == 0) {
                            return redirect()->route('tuition.detail')->with('success','Đã hoàn thành học phí');
                        }
                    }
                    if(count($update_count) == 0){
                        $tuition_detail->payment = $tuition[$k]->tuition;
                        $tuition_detail->total = ($tuition[$k]->tuition)*30;
                        $tuition_detail->count = 0;
                    }
                    $tuition_detail->save();
                }
            }
        }   
    }
}
