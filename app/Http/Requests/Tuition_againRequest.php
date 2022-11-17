<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tuition_againRequest extends FormRequest
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
            'subject_id' => 'required|unique:tuition_agains',
            'tuition' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'subject_id.required' => 'Yêu cầu nhập môn học',
            'subject_id.unique' => 'Môn học đã tồn tại',
            'tuition.required' => 'Yêu cầu nhập phí học lại',
        ];
    }
}
