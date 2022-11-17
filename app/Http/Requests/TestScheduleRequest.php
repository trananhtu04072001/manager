<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestScheduleRequest extends FormRequest
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
            'room_id' => 'required',
            'subject_id' => 'required',
            'start' => 'required|before:end',
            'end' => 'required|after:start',
        ];
    }

    public function messages()
    {
        return [
            'admin_id.required' => 'Yêu cầu chọn giảng viên',
            'room_id.required' => 'Yêu cầu chọn lớp',
            'subject_id.required' => 'Yêu cầu chọn môn học',
            'start.required' => 'Yêu cầu chọn giờ bắt đầu',
            'start.before' => 'Giờ bắt đầu phải nhỏ hơn giờ kết thúc',
            'end.required' => 'Yêu cầu chọn giờ kết thúc',
            'end.after' => 'Giờ kết thúc phải lớn hơn giờ bắt đầu',
        ];
    }
}
