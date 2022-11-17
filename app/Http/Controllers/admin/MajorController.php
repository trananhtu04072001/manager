<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index() {
        $major = Major::get();
        return view('major.index',['major'=>$major]);
    }

    public function getMajor() {
        return view('major.insert');
    }

    public function postMajor(Request $request) {
        $major = new Major();
        $major->name = $request->name;
        $major->save();
        return redirect()->route('major.index')->with('success','Thêm ngành học thành công');
    }

    public function delete($id) {
        $major = Major::find($id);
        $major->delete();
        return redirect()->route('major.index');
    }
}
