<?php

namespace App\Repositories;

use App\contract\usercontract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Exception;
use Illuminate\Support\Facades\Auth;

class userrepository implements usercontract
{
    public function Register($data)
    {
        $input = $data;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        return $user;
    }

    public function Login(array $request)
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user['password'])) {
            return false;
        }
        return [
            'true',
            "token" => $user->createToken('ThisApplication')->accessToken,
        ];
    }


    public function Find(array $request)
    {
        $user = User::where('email', $request['email'])->first();
        return $user;
    }
}
