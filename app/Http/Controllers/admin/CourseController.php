<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $course = Course::get();
        return view('course.index',['course'=>$course]);
    }

    public function getCourse() {
        return view('course.insert');
    }

    public function postCourse(Request $request) {
        $course = new Course();
        $course->name = $request->name;
        $course->save();
        return redirect()->route('course.index');
    }

    public function delete($id) {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course.index');
    }
}
