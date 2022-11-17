<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule_againRequest;
use App\Models\Admin;
use App\Models\Subject;
use App\Responsitory\Schedule_againResponsitory;
use Illuminate\Http\Request;

class Schedule_againController extends Controller
{
    public function __construct(Schedule_againResponsitory $schedule_againResponsitory)
    {
        $this->schedule_againResponsitory = $schedule_againResponsitory;
    }

    public function index() {
        $schedule = $this->schedule_againResponsitory->getAll();
        return view('learn_again.index',['schedule' => $schedule]);
    }

    public function get_schedule() {
        $teacher = Admin::where('level_id',2)->get();
        $subject = Subject::get();
        return view('learn_again.insert',[
            'teacher' => $teacher,
            'subject' => $subject
        ]);
    }

    public function post_schedule(Schedule_againRequest $request) {
        $this->schedule_againResponsitory->create($request->all());
        return redirect()->route('schedule_again.index')->with('success','Thêm lịch học lại thành công');
    }
}
