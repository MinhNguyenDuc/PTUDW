<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'admin'){
                $list_user = User::all()->where('status', 1);
                return view('admin.users')
                    ->with('list_user', $list_user);
            }
            else return redirect('/login');
        }
        else return redirect('/login');
    }

    public function removeUser($userID){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'admin'){
                $user = User::find($userID);
                $user->status = 0;
                $user->save();
                return http_response_code(200);
            }
            else return http_response_code(403);
        }
        else return redirect('/login');
    }

    public function reAuthorize($userID){
        if(Auth::check()){
            $current_user = User::find(Auth::id());
            if($current_user->permission == 'admin'){
                $user = User::find($userID);
                $user->permission = Input::get('permission');
                $user->save();
                return http_response_code(200);
            }
            else return http_response_code(403);
        }
        else return redirect('/login');
    }
}
