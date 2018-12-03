<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SurveyResultAPIController extends Controller
{
    private $URI = "https://script.googleusercontent.com/macros/echo?user_content_key=eF7jeShSmYQzxL8_8LfIbEj1RTusa8F0q68WovaMn51bQLsON4STInGgpVtd6qWBwBxSwLuuALkTGtvJB3teexev315BW5WVm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnKofyW7TapKNntGFJyRMj_uHcrikyj5OY3y3_0MyaJlWzk0d0tzBh1ou60QOUm1hJKV-rV9yhQ38&lib=MIO4DzsEb2GG5Y7Q-gD47z0XRs0dEwbx0";

    public function index(){
        $client = new Client();
        $res = $client->get($this->URI);
        $arr = json_decode($res->getBody()->__toString());
        $num_academic_year = [];
        $num_major = [];
        $num_academic_level = [];
        $num_isRightJob = [];
        $num_workingPlace = [];
        $num_salary = [];

        foreach ($arr->survey as $value){
            $academic_year = $value->academic_year;
            $major = $value->major;
            $academic_level = $value->academic_level;
            $isRightJob = $value->isRightJob;
            $workingPlace = $value->workingPlace;
            $salary = $value->salary;

            if(!array_key_exists($academic_year, $num_academic_year)){
                $num_academic_year[$academic_year] = 1;
            }
            else {
                $num_academic_year[$academic_year]++;
            }

            if(!array_key_exists($major, $num_major)){
                $num_major[$major] = 1;
            }
            else {
                $num_major[$major]++;
            }

            if(!array_key_exists($academic_level, $num_academic_level)){
                $num_academic_level[$academic_level] = 1;
            }
            else {
                $num_academic_level[$academic_level]++;
            }

            if(!array_key_exists($isRightJob, $num_isRightJob)){
                $num_isRightJob[$isRightJob] = 1;
            }
            else {
                $num_isRightJob[$isRightJob]++;
            }

            if(!array_key_exists($workingPlace, $num_workingPlace)){
                $num_workingPlace[$workingPlace] = 1;
            }
            else {
                $num_workingPlace[$workingPlace]++;
            }

            if(!array_key_exists($salary, $num_salary)){
                $num_salary[$salary] = 1;
            }
            else {
                $num_salary[$salary]++;
            }
        }
        $json_res = [];
        $json_res[0] = $num_academic_year;
        $json_res[1] = $num_major;
        $json_res[2] = $num_academic_level;
        $json_res[3] = $num_isRightJob;
        $json_res[4] = $num_workingPlace;
        $json_res[5] = $num_salary;

        return json_encode($json_res, JSON_UNESCAPED_UNICODE);
    }
}
