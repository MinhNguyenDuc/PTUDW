<?php

namespace App\Http\Controllers;

use App\History;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index(){
        if(Auth::check()){
            $permission = User::find(Auth::id())->permission;
            if($permission == 'admin'){
                $history = History::orderBy('id', 'DESC')->get();
                return view('admin.history')->with('history', $history);
            }
            else return redirect('/login');
        }
        else return redirect('/login');
    }
}
