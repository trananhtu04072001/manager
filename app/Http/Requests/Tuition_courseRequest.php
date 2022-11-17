<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tuition_courseRequest extends FormRequest
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
            'course_id' => 'required',
            'major_id' => 'required',
            'tuition' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'course_id.required' => 'Yêu cầu nhập khoá học',
            'major_id.required' => 'Yêu cầu nhập ngành học',
            'tuition.required' => 'Yêu cầu nhập học phí 1 đợt',
        ];
    }
}
