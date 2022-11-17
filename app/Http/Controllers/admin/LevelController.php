<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Tuition_course;
use App\Models\Tuition_student;
use App\Responsitory\LevelResponsitory;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct(LevelResponsitory $LevelResponsitory)
    {
        $this->LevelResponsitory = $LevelResponsitory;
    }

    public function index() {
        $level = $this->LevelResponsitory->getAll();
        return view('level.index',['level'=>$level]);
    }

    public function getLevel() {
        return view('Level.insert');
    }

    public function postLevel(LevelRequest $request) {
        $this->LevelResponsitory->create($request->all());
        return redirect()->route('level.index')->with('success','Thêm phòng ban thành công');
    }

    public function delete($id) {
        $this->LevelResponsitory->delete($id);
        return redirect()->route('level.index')->with('success','Xoá phòng ban thành công');
    }
}
