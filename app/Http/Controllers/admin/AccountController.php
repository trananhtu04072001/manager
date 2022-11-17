<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRegisterRequest;
use App\Models\Level;
use App\Responsitory\AdminResponsitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct(AdminResponsitory $adminResponsitory)
    {
        $this->adminResponsitory = $adminResponsitory;
    }
    public function getRegister() {
        $level = Level::get();
        return view('account.register',['level'=>$level]);
    }
    public function postRegister(AdminRegisterRequest $request) {
        $request->validated();
        $this->adminResponsitory->create($request->all());
        return redirect()->route('admin.register')->with('success','Đăng kí thành công,vui lòng chờ xác nhận tài khoản');
    }
    public function getLogin() {
        return view('account.login');
    }

    public function postLogin(AdminLoginRequest $request) {
        $request->validated();
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt([
            'email' => $email,
            'password' => $password,
            'status' => 1
        ])){
            return redirect()->route('home');
        }
        else {
            return redirect()->back()->with('Bạn không có quyền truy cập');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}


