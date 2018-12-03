<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictApiController extends Controller
{
    public function getDistrictByProvince($id){
        $listDistrict = DB::table('districts')->where('province', $id)->get();
        return $listDistrict;
    }
}
