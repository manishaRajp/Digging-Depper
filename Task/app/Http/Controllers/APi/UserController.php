<?php

namespace App\Http\Controllers\APi;

use App\contract\usercontract;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\loginRequest;
use App\Http\Requests\User\ShowRequest;
use App\Http\Requests\User\storeuRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function __construct(usercontract $userservices)
    {
        $this->userservices = $userservices;
    }

    public function Register(storeuRequest $request)
    {
        $result = $this->userservices->Register($request->all());
        return $this->sendResponse($result, 'User Register successfully.', 200);
    }

    public function Login(loginRequest $request)
    {
        $result = $this->userservices->Login($request->all());
        if ($result == true) {
            return $this->sendResponse($result, 'User Login successfully.', 200);
        } else {
            return $this->sendError($result, 'Please Cheak The Data not Macth.', 200);
        }
    }

    public function Find(ShowRequest $request)
    {
        if ($result = $this->userservices->Find($request->all())) {
            return $this->sendResponse($result, ' found successfully.', 200);
        }
        return $this->sendError($result, ' not found.', 200);
    }


    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
        return response(['message' => 'You have been successfully logged out.'], 200);
    }
}