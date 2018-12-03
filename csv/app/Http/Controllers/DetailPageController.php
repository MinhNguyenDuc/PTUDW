<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailPageController extends Controller
{
    public function showStudentDetail($studentID) {
        if(Auth::check()){
            $student = Student::find($studentID);
            $province = Province::find($student->province);
            $district = District::find($student->district);
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'user'){
                return view('client.detail')
                    ->with('student', $student)
                    ->with('province', $province)
                    ->with('district', $district);
            }
            else if($current_user->permission == 'admin'){
                return view('admin.detail')
                    ->with('student', $student)
                    ->with('province', $province)
                    ->with('district', $district);
            }
        }
        else return redirect('/login');
    }
}
