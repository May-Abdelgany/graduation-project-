<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'number_of_question_tf' => 'required',
            'number_of_question_complete' => 'required',
            'number_of_question_static_mcq' => 'required',
            'end_time' => 'required',
            'time_of_exam' => 'required',
            'course_id' => 'required',
        ];
    }
}
