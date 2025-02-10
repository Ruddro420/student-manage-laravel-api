<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studen extends Model
{
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'course_name',
        'batch_no',
        'admission_slip_no',
        'password',
        'ex_1',
        'ex_2',
    ];
}
