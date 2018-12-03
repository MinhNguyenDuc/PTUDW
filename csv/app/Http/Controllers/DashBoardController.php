<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            $num_user = User::where('status', 1)->count();
            $num_student = Student::where('status', 1)->count();
            $num_survey = User::where('survey', 1)->count();
            if($current_user->permission == 'user'){
                return view('client.dashboard')
                    ->with('num_user', $num_user)
                    ->with('num_student', $num_student)
                    ->with('num_survey', $num_survey);
            }
            else {
                return view('admin.dashboard')
                    ->with('num_user', $num_user)
                    ->with('num_student', $num_student)
                    ->with('num_survey', $num_survey);
            }
        }
        else return redirect('/login');
    }
}
