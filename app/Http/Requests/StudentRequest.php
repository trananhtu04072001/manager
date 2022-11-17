<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_code' => 'required|unique:students',
            'name' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone' => 'required',
            'address' => 'required',
            'course_id' => 'required',
            'room_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'student_code.required' => 'Yêu cầu nhập mã sinh viên',
            'student_code.unique' => 'Mã sinh viên đã tồn tại',
            'name.required' => 'Yêu cầu nhập tên',
            'email.required' => 'Yêu cầu nhập email',
            'email.regex' => 'Email đã sai định dạng',
            'phone.required' => 'Yêu cầu nhập số điện thoại',
            'address.required' => 'Yêu cầu nhập địa chỉ',
            'course_id.required' => 'Yêu cầu chọn khoá',
            'room_id.required' => 'Yêu cầu chọn lớp',
        ];
    }
}
