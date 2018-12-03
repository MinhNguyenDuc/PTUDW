<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use LogsActivity;

    protected $table = 'students';
    public $timestamps = true;
    protected $primaryKey = 'studentID';


}
