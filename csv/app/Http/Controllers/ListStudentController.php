<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListStudentController extends Controller
{
    public function getListPaginate(){
        if(Auth::check()){
            $list_student = Student::all()->where('status', 1);
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'user'){
                return view('client.list')
                    ->with('list_student', $list_student);
            }
            else if ($current_user->permission == 'admin'){
                return view('admin.list')
                    ->with('list_student', $list_student);
            }

        }
        else return redirect('/login');
    }

    public function removeStudent($studentID){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'admin'){
                $student = Student::find($studentID);
                $student->status = 0;
                $student->save();
                return http_response_code(200);
            }
            else return http_response_code(403);
        }
        else return redirect('/login');
    }
}
