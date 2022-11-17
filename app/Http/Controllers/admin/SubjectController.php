<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Responsitory\SubjectResponsitory;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function __construct(SubjectResponsitory $subjectResponsitory)
    {
        $this->subjectResponsitory = $subjectResponsitory;
    }
    public function index() {
        $subject = Subject::get();
        return view('subject.index',['subject'=>$subject]);
    }

    public function getSubject() {
        return view('subject.insert');
    }

    public function postSubject(Request $request) {
        $this->subjectResponsitory->create($request->all());
        return redirect()->route('subject.index')->with('success','Thêm môn học thành công');
    }

    public function delete($id) {
        $this->subjectResponsitory->delete($id);
        return redirect()->route('subject.index');
    }
}
