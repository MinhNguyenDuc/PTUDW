<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SurveyController extends Controller
{
    public function loadPage(){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            $id = $current_user->id;
            if ($current_user->permission == 'user'){
                if($current_user->survey == 0){
                    return view('client.survey')
                        ->with('id', $id);
                }
                else {
                    return view('client.done-survey');
                }
            }
            else {
                return redirect('/home');
            }
        }
        else return redirect('/login');
    }

    public function done($id){
        $user = User::find($id);
        $user->survey = Input::get('survey');
        $user->save();
        return http_response_code(200);
    }

}
