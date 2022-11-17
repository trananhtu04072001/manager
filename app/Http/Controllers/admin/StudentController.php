<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Room;
use App\Models\Student;
use App\Responsitory\StudentResponsitory;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(StudentResponsitory $studentResponsitory)
    {
        $this->studentResponsitory = $studentResponsitory;
    }

    public function index($id) {
        $student = $this->studentResponsitory->getAll()->where('room_id',$id);
        return view('student.index',['student' => $student]);
    }

    public function getStudent() {
        $course = Course::get();
        $room = Room::get();
        return view('student.insert',[
            'course' => $course,
            'room' => $room,
        ]);
    }

    public function postStudent(StudentRequest $request) {
        $request->validated();
        $this->studentResponsitory->create($request->all());
        return redirect()->route('student.add')->with('success','Thêm học viên thành công');
    }

    public function statusStudent($id) {
        $student = Student::find($id);
        if($student->status == 1) {
            $student->status = 0;
        }
        else {
            $student->status = 1;
        }
        $student->save();
        return redirect()->route('student.index',$student->room_id)->with('success','Cập nhật trạng thái sinh viên thành công');
    }
}
