<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Models\Admin;
use App\Models\Attendance;
use App\Models\Attendance_detail;
use App\Models\Program;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subject_status;
use App\Responsitory\AttendanceResponsitory;
use App\Responsitory\ScheduleResponsitory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function __construct(ScheduleResponsitory $scheduleResponsitory,AttendanceResponsitory $attendanceResponsitory)
    {
        $this->scheduleResponsitory = $scheduleResponsitory;
        $this->attendanceResponsitory = $attendanceResponsitory;
    }

    public function index() {
        $schedule = $this->scheduleResponsitory->getAll()->where('status','!=',2)->where('status','!=',3);
        return view('schedule.index',['schedule' => $schedule]);
    }

    public function getSchedule() {
        $teacher = Admin::where('level_id',2)->get();
        $room = Room::get();
        $subject = Subject::get();
        $program = Program::with(['subject:id,name'])->get();
        return view('schedule.insert',[
            'teacher' => $teacher,
            'room' => $room,
            'subject' => $subject,
            'program' => $program
        ]);
    }

    public function postSchedule(ScheduleRequest $request) {
        $request->validated();
        $sche = Schedule::get();
        for($i = 0 ; $i < count($sche) ; $i++){
            $datestart=date_create($request->start);
            $dateformat = date_format($datestart,'Y-m-d H:i:s');
            $dateEnd = date_create($request->end);
            $date_end = date_format($dateEnd,'Y-m-d H:i:s');
            if(in_array($request->subject_id,array($sche[$i]->subject_id))
             && in_array($request->room_id,array($sche[$i]->room_id))
             && in_array($dateformat,array($sche[$i]->start))
             && in_array($date_end,array($sche[$i]->end))
             ) {
                return redirect()->route('schedule.get')->with('success','Lịch dạy đã tồn tại');
            }
        }
        // $this->scheduleResponsitory->scope($request->all());
        $schedule = $this->scheduleResponsitory->create($request->all());
        $subject_learn = Subject::find($schedule->subject_id);
        $status = Subject_status::select('subject_id','room_id',DB::raw('MIN(hour) as min'))->groupBy('subject_id')->groupBy('room_id')->get();
        $start = new Carbon($schedule->start);
        $end = new Carbon($schedule->end);
        $date = strtotime($end) - strtotime($start);
        $dateFomart = date('H',$date);
        $subject = new Subject_status();
        $subject->schedule_id = $schedule->id;
        $subject->subject_id = $schedule->subject_id;
        $subject->room_id = $schedule->room_id;
        $subject->hour_learn = $dateFomart;
        if(count($status) > 0) {
        $subject->hour = ($status[0]->min)-($dateFomart);
        if(($status[0]->min) == 0 && ($status[0]->subject_id) == $schedule->subject_id) {
            $sche = $this->scheduleResponsitory->delete($schedule->id);
            return redirect()->route('schedule.index')->with('success','Môn học đã hoàn thành');
        }
        }
        else {
            $subject->hour = ($subject_learn->hour)-($dateFomart);
        }
        $subject->save();
        return redirect()->route('schedule.index')->with('success','Thêm lịch học thành công');
    }

    public function hisSchedule() {
        $schedule = $this->scheduleResponsitory->getAll()->where('status','!=',1)->where('status','!=',0);
        return view('schedule.history',['schedule'=> $schedule]);
    }

    public function detail_hisSchedule($id) {
        $schedule = $this->scheduleResponsitory->find($id);
        $schedule_id = $schedule->id;
        $attendance = Attendance::with(['admin:id,name'])->where('schedule_id',$schedule_id)->get();
        $attend_id = $attendance[0]->id;
        $attendance_detail = Attendance_detail::where('attendance_id',$attend_id)->get();
        return view('schedule.history_detail',[
            'schedule'=>$schedule,
            'attendance' => $attendance,
            'attendance_detail' => $attendance_detail,
        ]);
    }

    public function schedule_learn() {
        $schedule = $this->scheduleResponsitory->getAll()->where('status','!=',2)->where('status','!=',3);
        return view('schedule_learn.schedule_learn',['schedule' => $schedule]);
    }

    public function updateSchedule() {
        $teacher = Admin::where('level_id',2)->get();
        return view('schedule_learn.update',[
            'teacher' => $teacher,
        ]);
    }

    public function postUpdate($id,Request $request) {
        $this->scheduleResponsitory->update($id,$request->all());
        return redirect()->route('schedule.learn')->with('success','Sửa thành công');
    }
}
