<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Again_detail;
use App\Models\Exam_status;
use App\Models\Point;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Test_schedule;
use App\Models\Tuition_again;
use App\Responsitory\PointResponsitory;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function __construct(PointResponsitory $pointResponsitory)
    {
        $this->pointResponsitory = $pointResponsitory;
    }

    public function getClass() {
        $room = Room::get();
        return view('point.class',['room' => $room]);
    }

    public function getClass_Exam($id) {
        $schedule_exam = Test_schedule::where('room_id',$id)->get();
        return view('point.scheduleClass',['schedule_exam' => $schedule_exam]);
    }

    public function getClass_Exam_detail($id) {
        $point = Point::where('schedule_id',$id)->get();
        return view('point.exam_detail',['point' => $point]);
    }

    public function getPoint($id) {
        $schedule = Test_schedule::where('id',$id)->get();
        foreach($schedule as $item) {
            $exam = Exam_status::with(['subject:id,name','room:id,name','student:id,name,student_code'])
            ->where('subject_id',$item->subject_id)->where('room_id',$item->room_id)
            ->where('status_learn',1)->get();
        }
        $admin = Admin::where('level_id',2)->get();
        return view('point.insert',
        [
            'schedule' => $schedule,
            'exam' => $exam,
            'admin' => $admin
        ]);
    }

    public function postPoint($id,Request $request) {
        for($i = 0 ; $i < count($request->student_id) ; $i++)
        {
        $point = new Point();
        $point->schedule_id = $id;
        $point->student_id = $request->student_id[$i];
        $point->room_id = $request->room_id;
        $point->subject_id = $request->subject_id;
        if($request->point_two[$i] == null && $request->point_one[$i] != null) {
            $point->point_one = $request->point_one[$i];
            $point->point_two = '0';
        }
        if($request->point_one[$i] == null && $request->point_two[$i] != null) {
            $point->point_one = '0';
            $point->point_two = $request->point_two[$i];
        }
        $point->description = $request->description;
        $point->save();
    }
        $pointt = Point::with(['schedule:id,subject_id,room_id'])
        ->where('schedule_id',$id)->get();
        foreach($pointt as $item) {
        if($item->point_one < 5) {
            $exam_status = Exam_status::where('subject_id',$item->schedule->subject_id)
            ->where('room_id',$item->schedule->room_id)
            ->where('student_id',$item->student_id)->get();
            for($k = 0 ; $k < count($exam_status) ; $k++){
            $exam_status[$k]->status_learn = '0';
            $exam_status[$k]->save();
            }
        }
        }

        $schedule = Test_schedule::find($id);
        $schedule->status = '0';
        $schedule->save();
        return redirect()->route('test.index')->with('success','Vào điểm lần 1 thành công');
    }

    public function getPointTwo($id) {
        $schedule = Test_schedule::where('id',$id)->get();
        foreach($schedule as $item) {
            $exam = Exam_status::with(['subject:id,name','room:id,name','student:id,name,student_code'])
            ->where('subject_id',$item->subject_id)->where('room_id',$item->room_id)
            ->where('status_learn',0)->get();
        }
        $admin = Admin::where('level_id',2)->get();
        return view('point.insertTwo',
        [
            'schedule' => $schedule,
            'exam' => $exam,
            'admin' => $admin
        ]);
    }

    public function postPointTwo($id,Request $request) {
            for($i = 0 ; $i < count($request->student_id) ; $i++) {
        $poit = $this->pointResponsitory->getAll();
        $point = $this->pointResponsitory->getAll()->where('schedule_id',$id)
        ->where('student_id',$request->student_id[$i]);
        if(count($point) > 0){
            for($k = 0 ; $k < count($poit) ; $k++){
                if(empty($point[$k]) == false){
                 $point[$k]->point_two = $request->point_two[$i];
                 $point[$k]->save();
            }
            }
        }
        if(count($point) == 0) {
            $point = new Point();
            $point->schedule_id = $id;
            $point->student_id = $request->student_id[$i];
            $point->room_id = $request->room_id;
            $point->subject_id = $request->subject_id;
            if($request->point_one[$i] == null && $request->point_two[$i] != null) {
                $point->point_one = '0';
                $point->point_two = $request->point_two[$i];
            }
            $point->description = $request->description;
            $point->save();
        }
        }
        $sche = Test_schedule::find($id);
        $sche->status = '2';
        $sche->save();

        $status = Point::where('schedule_id',$id)->get();
        for($i = 0 ; $i < count($status) ; $i++){
            if($status[$i]->point_one >= 5 || $status[$i]->point_two >= 5) {
                $status[$i]->status = '1';
                $status[$i]->save();
            }
        }
// phi hoc lại
        $poi = Point::where('status',0)->get();
        $tuition_again = Tuition_again::get();
        for($n = 0 ; $n < count($poi) ; $n++) {
        for($k = 0 ; $k < count($tuition_again) ; $k++) {
            if($poi[$n]->subject_id == $tuition_again[$k]->subject_id){
            $again = new Again_detail();
            $again->student_id = $poi[$n]->student_id;
            $again->tuition_again_id = $tuition_again[$k]->id;
            $again->subject_id = $tuition_again[$k]->subject_id;
            $again->save();
            }
        }
    }
        return redirect()->route('test.index')->with('success','Vào điểm lần 2 thành công');
    }
}
