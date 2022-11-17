<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tuition_courseRequest;
use App\Models\Course;
use App\Models\Major;
use App\Models\Tuition_course;
use App\Models\Tuition_student;
use App\Responsitory\Tuition_courseResponsitory;
use App\Responsitory\Tuition_studentResponsitory;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    public function __construct(Tuition_courseResponsitory $tuition_courseResponsitory,Tuition_studentResponsitory $tuition_studentResponsitory)
    {
        $this->tuition_courseResponsitory = $tuition_courseResponsitory;
        $this->tuition_studentResponsitory = $tuition_studentResponsitory;
    }
    public function tuitionIndex() {
        $tuition_course = $this->tuition_courseResponsitory->getAll();
        return view('tuition_course.index',['tuition_course' => $tuition_course]);
    }

    public function gettuitionIndex() {
        $major = Major::get();
        $course = Course::get();
        return view('tuition_course.insert',[
            'major' => $major,
            'course' => $course,
        ]);
    }

    public function posttuitionIndex(Tuition_courseRequest $request) {
        $this->tuition_courseResponsitory->create($request->all());
        return redirect()->route('tuition.index')->with('success','Thêm học phí ngành học thành công');
    }

    public function tuitionDetail() {
        $detail = $this->tuition_studentResponsitory->getAll();
        return view('tuition_course.detail',['detail' => $detail]);
    }

    public function tuitionUpdate($id) {
        $detail = Tuition_student::find($id);
        $detail->status = 1;
        $update_count = Tuition_student::where('student_id',$detail->student_id)->get();
        if(count($update_count) > 0){
            $detail->total = ($detail->total)-($detail->payment);
            $detail->count += 1;
        }
        $detail->save();
        return redirect()->route('tuition.detail')->with('success','Cập nhật thành công');
    }

    public function get_tuitionUpdate($id) {
        $tuition = $this->tuition_studentResponsitory->find($id);
        return view('tuition_student.update',['tuition' => $tuition]);
    }

    public function post_tuitionUpdate($id,Request $request) {
        $tuition = Tuition_student::find($id);
        $tuition->payment = $request->payment;
        $tuition->total = ($tuition->total)-($request->payment);
        $tuition->count = $request->count;
        $tuition->status = 1;
        if($tuition->count == 30 && $tuition->total == 0) {
            $tuition->status = 2;
        }
        $tuition->save();
        return redirect()->route('tuition.detail')->with('success','Đóng học phí thành công');
    }
}
