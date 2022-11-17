<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Semmester;
use App\Models\Subject;
use App\Responsitory\ProgramResponsitory;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct(ProgramResponsitory $programResponsitory)
    {
        $this->programResponsitory = $programResponsitory;
    }

    public function index() {
        $program = $this->programResponsitory->getAll();
        return view('program.index',['program'=>$program]);
    }

    public function getProgram() {
        $major = Major::get();
        $subject = Subject::get();
        $semmester = Semmester::get();
        return view('program.insert',[
            'major' => $major,
            'subject' => $subject,
            'semmester' => $semmester
        ]);
    }

    public function postProgram(Request $request) {
        $this->programResponsitory->create($request->all());
        return redirect()->route('program.index')->with('Thêm chương trình học thành công');
    }

    public function delete($id) {
        $this->programResponsitory->delete($id);
        return redirect()->route('program.index');
    }

    public function getSemmester() {
        return view('semmester.insert');
    }

    public function postSemmester(Request $request) {
        $semmester = new Semmester();
        $semmester->name = $request->name;
        $semmester->save();
        return redirect()->route('program.index');
    }
}
