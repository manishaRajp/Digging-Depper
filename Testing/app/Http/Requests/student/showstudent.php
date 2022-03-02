<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class showstudent extends FormRequest
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

    public function rules()
    {
        return [
            'en_no' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'en_no.required' => 'Please Enter student_enrollmant ',
        ];
    }
}
