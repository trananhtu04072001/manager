<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Responsitory\AdminResponsitory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(AdminResponsitory $adminResponsitory)
    {
        $this->adminResponsitory = $adminResponsitory;
    }

    public function listTeacher() {
        $teacher = $this->adminResponsitory->getAll()->where('level_id',2);
        return view('admin.teacher',['teacher' => $teacher]);
    }

    public function updateStatus($id) {
        $teacher = $this->adminResponsitory->find($id);
        if($teacher->status == 0){
            $teacher->status = 1;
            $teacher->save();
        }
        else {
            $teacher->status = 0;
            $teacher->save();
        }
        return redirect()->route('admin.listTeacher')->with('success','kích hoạt tài khoản thành công');
    }

    public function listStaff() {
        $staff = $this->adminResponsitory->getAll()->where('level_id','!=',1)->where('level_id','!=',2);
        return view('admin.staff',['staff'=>$staff]);
    }
}
