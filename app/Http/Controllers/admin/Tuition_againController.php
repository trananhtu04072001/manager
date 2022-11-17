<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tuition_againRequest;
use App\Models\Again_detail;
use App\Models\Subject;
use App\Responsitory\Tuition_againResponsitory;

class Tuition_againController extends Controller
{
    public function __construct(Tuition_againResponsitory $tuition_againResponsitory)
    {
        $this->tuition_againResponsitory = $tuition_againResponsitory;
    }

    public function index() {
        $tuition = $this->tuition_againResponsitory->getAll();
        return view('tuition_again.index',['tuition' => $tuition]);
    }

    public function get_again() {
        $subject = Subject::get();
        return view('tuition_again.insert',['subject' => $subject]);
    }

    public function post_again(Tuition_againRequest $request) {
        $this->tuition_againResponsitory->create($request->all());
        return redirect()->route('tuition_again.index');
    }

    public function again_detail() {
        $detail = Again_detail::get();
        return view('tuition_again.detail',['detail' => $detail]);
    }

    public function update($id) {
        $detail = Again_detail::find($id);
        if($detail->status == 0) {
            $detail->status = 1;
            $detail->save();
        }
        else {
            $detail->status = 0;
            $detail->save();
        }
        return redirect()->route('again_detail')->with('success','Cập nhật trạng thái thành công');
    }
}
