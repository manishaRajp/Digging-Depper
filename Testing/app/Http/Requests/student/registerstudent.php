<?php

namespace App\Http\Requests\student;

use Illuminate\Foundation\Http\FormRequest;

class registerstudent extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'en_no' => 'unique:studets|required|numeric',
            'name' => 'unique:studets|required|alpha',
            'email'    => 'unique:studets|required|email',
            'password' => 'required|min:8',
            'rank' => 'required'
        ];

    }
}
