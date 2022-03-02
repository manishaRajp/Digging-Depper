<?php

namespace App\Repositories;

use App\Contracts\studentContract;
use App\Models\Studet;
use Illuminate\Support\Facades\Hash;

use Exception;

class studentReposity implements studentContract
{
    public function studentRegister($data)
    {
        $input = $data;
        $input['password'] = Hash::make($input['password']);
        $student = Studet::create($input);
        return $student;
    }

    public function studentLogin(array $request)
    {
        $student = Studet::where('email', $request['email'])->first();
        if (!$student || !Hash::check($request['password'], $student['password'])) {
            return false;
        }
        return [
            'true',
            "token" => $student->createToken('ThisApplication')->accessToken,
        ];


    }
   
    
    public function studentFind($request)
    {
        $student = Studet::where('en_no', $request['en_no'])->first();
        return $student;
    }

    
}
