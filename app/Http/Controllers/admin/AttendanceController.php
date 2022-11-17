<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Again_detail;
use App\Models\Attendance_detail;
use App\Models\Exam_status;
use App\Models\Salary;
use App\Models\Salary_detail;
use App\Models\Schedule;
use App\Models\Student;
use App\Responsitory\Attendance_detailResponsitory;
use App\Responsitory\AttendanceResponsitory;
use App\Responsitory\Exam_statusResponsitory;
use App\Responsitory\ScheduleResponsitory;
use App\Responsitory\Subject_statusResponsitory;
use Illuminate\Http\Request;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class AttendanceController extends Controller
{
    public function __construct(ScheduleResponsitory $scheduleResponsitory,
    AttendanceResponsitory $attendanceResponsitory,
    Attendance_detailResponsitory $attendance_detailResponsitory,
    Subject_statusResponsitory $subject_statusResponsitory,
    Exam_statusResponsitory $exam_statusResponsitory)
    {
        $this->scheduleResponsitory = $scheduleResponsitory;
        $this->attendanceResponsitory = $attendanceResponsitory;
        $this->attendance_detailResponsitory = $attendance_detailResponsitory;
        $this->subject_statusResponsitory = $subject_statusResponsitory;
        $this->exam_statusResponsitory = $exam_statusResponsitory;
    }
    public function getAtten($id) {
        $schedule = $this->scheduleResponsitory->find($id);
        $schedule->attendance_time = Carbon::now('Asia/Ho_Chi_Minh');
        $schedule->save();
        $room = $schedule->room->id;
        $student = Student::where('room_id',$room)->get();
        $admin = Admin::where('level_id',2)->get();
        $start = new Carbon($schedule->start);
        $end = new Carbon($schedule->end);
        $attendance_time = new Carbon($schedule->attendance_time);
        $date = strtotime($end) - strtotime($start);
        $dateFomart = date('H',$date);
        if(strtotime($attendance_time) < strtotime($start) == true) {
            return redirect()->route('schedule.index')->with('success','Chưa đến giờ điểm danh');
        }
        if(strtotime($attendance_time) > strtotime($end) == true) {
            $this->scheduleResponsitory->update($id,['status' => 0]);
            return view('attendance.index',[
                'schedule' => $schedule,
                'student' => $student,
                'admin' => $admin,
                'dateFomart' => $dateFomart,
            ]);
        }
        if(strtotime($attendance_time) > strtotime($start) == true && strtotime($attendance_time) < strtotime($end) == true)
        {
        return view('attendance.index',[
            'schedule' => $schedule,
            'student' => $student,
            'admin' => $admin,
            'dateFomart' => $dateFomart,
        ]);
    }
    }

    public function postAtten(Request $request) {
        $atten = $this->attendanceResponsitory->create($request->all());
        $atten_id = $atten->id;
        for ($i = 0 ; $i < count($request->student_id) ; $i++) {
            $detail = new Attendance_detail();
            $detail->student_id = $request->student_id[$i];
            $detail->status_learn = $request->status_learn[$i];
            $detail->subject_id = $request->subject_id;
            $detail->room_id = $request->room_id;
            if($request->des[$i] != null){
            $detail->des = $request->des[$i];
            }
            else {
                $detail->des = 'null';    
            }
            $detail->attendance_id = $atten_id;
            if($request->status_learn[$i] == 1){
                $detail->active += 0;
            }
            if($request->status_learn[$i] == 0) {
                $detail->active += 1;
            }
            if($request->status_learn[$i] == 2) {
                $detail->active += 0.5;
            }
            $detail->save();
        }
        $schedule =  $this->scheduleResponsitory->find($atten->schedule_id);
        if($schedule->status == 0) {
        $this->scheduleResponsitory->update($atten->schedule_id,['status' => 3]);
        $salary = Salary::where('admin_id',$schedule->admin_id)->get();
        $start = new Carbon($schedule->start);
        $end = new Carbon($schedule->end);
        $date = strtotime($end) - strtotime($start);
        $dateFomart = date('H',$date);
        $salary_detail = new Salary_detail;
        $salary_detail->salary_id = $salary[0]->id;
        $salary_detail->Salary_bonus = (100000*$dateFomart) - (100000*$dateFomart*20/100);
        $salary_detail->save();
        return redirect()->route('schedule.index')->with('success','Điểm danh thành công');
        }
        if($schedule->status = 1 || $schedule->status = -1){
        $this->scheduleResponsitory->update($atten->schedule_id,['status' => 2]);
        $salary = Salary::where('admin_id',$schedule->admin_id)->get(); 
        $start = new Carbon($schedule->start);
        $end = new Carbon($schedule->end);
        $date = strtotime($end) - strtotime($start);
        $dateFomart = date('H',$date);
        $salary_detail = new Salary_detail;
        if(count($salary) > 0) {
        $salary_detail->salary_id = $salary[0]->id;
        }
        else {
            $salary_detail->salary_id = 0;
        }
        $salary_detail->Salary_bonus = 100000*$dateFomart;
        $salary_detail->save();
        return redirect()->route('schedule.index')->with('success','Điểm danh thành công');
        }
    }

    public function diLi($id) {
        $cou = $this->attendance_detailResponsitory->getAll();
        $detail = $this->attendance_detailResponsitory->getAll()->where('subject_id',$id); 
        $count = count($cou);
        if(count($detail) > 0) {
        foreach($detail as $item) {
            $room_id = $item->room_id;
        $status = $this->subject_statusResponsitory->getAll()
        ->where('hour',0)->where('subject_id',$id)->where('room_id',$room_id);
        break;
        }
            return view('attendance.diLi',[
                'detail' => $detail,
                'status' => $status,
                'count' => $count,
            ]);
        }
        if(count($detail) == 0){
            return redirect()->route('schedule.index')->with('success','Môn học chưa có dữ liệu chuyên cần');
        }
    }

    public function PostdiLi($id , Request $request) {
        $this->exam_statusResponsitory->create($request->all());
        return redirect()->route('atten.dili',$id);
    }
}
