<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\District;
use App\Http\Requests\StoreProfile;
use App\Province;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use JD\Cloudder\Facades\Cloudder;

class ProfileController extends Controller
{
    public function loadProfilePage(){
        if(Auth::check()){
            $user = $this->getCurrentUser();
            $permission = $user->permission;
            $student = Student::find($user->studentID);
            if($student == null){
                $student = new Student();
                $student->name = $user->name;
            }
            $province = Province::find($student->province);
            $district = District::find($student->district);
            if($permission == 'user'){
                return view('client.profile')
                    ->with('student', $student)
                    ->with('province', $province)
                    ->with('district', $district);
            }
            else if($permission == 'admin'){
                return view('admin.profile')
                    ->with('student', $student)
                    ->with('province', $province)
                    ->with('district', $district);
            }
        }
        else {
            return redirect('/login');
        }
    }

    public function editProfile(){
        if(Auth::check()){
            $user = $this->getCurrentUser();
            $permission = $user->permission;
            $student = $this->loadProfileData();
            $list_province = Province::all();
            $academic_years = AcademicYear::all();
            if($student == null){
                $student = new Student();
                $user = $this->getCurrentUser();
                $student->name = $user->name;
            }
            $district = $student->district;
            if($permission == 'user') {
                return view('client.edit-profile')
                    ->with('student', $student)
                    ->with('list_province', $list_province)
                    ->with('academic_years', $academic_years)
                    ->with('district', $district);
            }
            else if($permission == 'admin'){
                return view('admin.edit-profile')
                    ->with('student', $student)
                    ->with('list_province', $list_province)
                    ->with('academic_years', $academic_years)
                    ->with('district', $district);
            }
        }
        else return redirect('/login');
    }

    public function updateProfile(StoreProfile $request){

        $request->validated();

        $studentID = Input::get('studentID');
        $user = $this->getCurrentUser();
        $student = Student::find($studentID);
        if($student == null) {
            $student = new Student();
            $student->studentID = $studentID;
            $user->studentID = $studentID;
        }
        $student->name = Input::get('name');
        if(Input::hasFile('avatar')) {
            $image_id = time();
            Cloudder::upload(Input::file('avatar')->getRealPath(), $image_id);
            $student->avatar = Cloudder::secureShow($image_id);
        }
        else{
            $student->avatar = Input::get('avatar');
        }
        $student->email = Input::get('email');
        $student->birth = Input::get('birth');
        $student->phone = Input::get('phone');
        $student->province = Input::get('province');
        $student->gender = Input::get('gender');
        $student->district = Input::get('district');
        $student->academic_yearID = Input::get('academic_yearID');
        //print($student);

        $student->save();
        $user->save();

        return redirect('/profile');
    }


    public function loadProfileData(){
        $user = $this->getCurrentUser();
        $student = Student::find($user->studentID);
        return $student;
    }

    function getCurrentUser(){
        return User::find(Auth::id());
    }
}
