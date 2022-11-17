<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required|min:10',
            'address' => 'required',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Yêu cầu nhập tên',
            'email.required' => 'Yêu cầu nhập email',
            'email.regex' => 'Email không đúng định dạng',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'phone.min' => 'Số điện thoại phải nhiều hơn 10 kí tự',
            'address.required' => 'Yêu cầu nhập địa chỉ',
            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min' => 'Mật khẩu phải nhiều hơn 6 kí tự',
            'repassword.required' => 'Yêu cầu nhập mật khẩu nhập lại',
            'repassword.same' => 'Mật khẩu không khớp',
        ];
    }
}
