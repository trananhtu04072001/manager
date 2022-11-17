<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Major;
use App\Responsitory\RoomResponsitory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(RoomResponsitory $roomResponsitory)
    {
        $this->roomResponsitory = $roomResponsitory;
    }

    public function index() {
        $room = $this->roomResponsitory->getAll();
        return view('room.index',['room'=>$room]);
    }

    public function getRoom() {
        $course = Course::get();
        $major = Major::get();
        return view('room.insert',
        [
            'course' => $course,
            'major' => $major
        ]);
    }

    public function postRoom(Request $request) {
        $this->roomResponsitory->create($request->all());
        return redirect()->route('room.index')->with('success','Thêm lớp học thành công');
    }
}
