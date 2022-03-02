<?php

namespace App\Http\Controllers\APi;

use App\Contracts\studentContract;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\student\loginstudent;
use App\Http\Requests\student\registerstudent;
use App\Http\Requests\student\showstudent;
use App\Models\Studet;
use Illuminate\Http\Request;

class StudentController extends BaseController
{
    public function __construct(studentContract $studenServices)
    {
        $this->studenServices = $studenServices;
    }

     public function studentRegister(registerstudent $request)
    {
        $result = $this->studenServices->studentRegister($request->all());
        return $this->sendResponse($result, 'User Register successfully.', 200);
    }

     public function studentLogin(loginstudent $request)
    {
        $result = $this->studenServices->studentLogin($request->all());
    if($result == true){
            return $this->sendResponse($result, 'User Login successfully.', 200);
        }else {
            return $this->sendError($result, 'Please Cheak The Data not Macth.', 200);
        }
    }

    public function studentFind(showstudent $request)
    {
       if ( $result = $this->studenServices->studentFind($request->all()))
       {
           return $this->sendResponse($result, 'Student found successfully.', 200);
        }
        return $this->sendError($result, 'Student not found successfully.', 200);
    }


    public function studentlogout(Request $request)
    { 
        $student = Studet::all();
        $student->logout();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
