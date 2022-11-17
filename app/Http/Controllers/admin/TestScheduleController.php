<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestScheduleRequest;
use App\Models\Admin;
use App\Models\Point;
use App\Models\Schedule;
use App\Models\Subject_status;
use App\Models\Test_schedule;
use App\Responsitory\Test_scheduleResponsitory;
use Illuminate\Http\Request;

class TestScheduleController extends Controller
{
    public function __construct(Test_scheduleResponsitory $test_scheduleResponsitory)
    {
        $this->test_scheduleResponsitory =$test_scheduleResponsitory;
    }
    public function index_one() {
        $schedule = $this->test_scheduleResponsitory->getAll()->where('status','!=',2);
        return view('Test_schedule.index_one',['schedule' => $schedule]);
    }
    public function index() {
        $schedule = $this->test_scheduleResponsitory->getAll()->where('status','!=',2);
        return view('Test_schedule.index',['schedule' => $schedule]);
    }
    public function getExam() {
        $subject = Subject_status::with(['schedule:id,subject_id','subject:id,name','room:id,name'])->where('hour',0)->get();
        $teacher = Admin::where('level_id',2)->get();
        return view('Test_schedule.insert',[
            'subject'=>$subject,
            'teacher' => $teacher
        ]);
    }

    public function postExam(TestScheduleRequest $request) {
        $this->test_scheduleResponsitory->create($request->all());
        return redirect()->route('test.index')->with('success','Thêm lịch thi thành công');
    }


    public function historyExam() {
        $schedule = $this->test_scheduleResponsitory->getAll()->where('status',2);
        return view('Test_schedule.history',['schedule'=>$schedule]);
    }

    public function historyExam_detail($id) {
        $point = Point::where('schedule_id',$id)->get();
        $schedule = Test_schedule::find($id);
        return view('Test_schedule.history_detail',[
            'point' => $point,
            'schedule' => $schedule,
        ]);
    }
}
