<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
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
            'admin_id' => 'required',
            'salary' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'admin_id.required' => 'Yêu cầu chọn giảng viên',
            'salary.required' => 'Yêu cầu nhập số lương',
        ];
    }
}
