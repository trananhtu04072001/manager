<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalaryRequest;
use App\Models\Admin;
use App\Responsitory\SalarydetailResponsitory;
use App\Responsitory\SalaryResponsitory;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function __construct(SalaryResponsitory $salaryResponsitory, SalarydetailResponsitory $salarydetailResponsitory)
    {
        $this->salaryResponsitory = $salaryResponsitory;
        $this->salarydetailResponsitory = $salarydetailResponsitory;
    }

    public function index() {
        $salary = $this->salaryResponsitory->getAll();
        return view('salary.index',['salary'=>$salary]);
    }

    public function getInsert() {
        $admin = Admin::where('level_id',2)->get();
        return view('salary.insert',['admin'=>$admin]);
    }

    public function postInsert(SalaryRequest $request) {
        $request->validated();
        $this->salaryResponsitory->create($request->all());
        return redirect()->route('salary.index')->with('success','thêm lương thành công');
    }

    public function detailSalary() {
        $detail = $this->salarydetailResponsitory->getAll();
        return view('salary.detail',['detail'=>$detail]);
    }
}
