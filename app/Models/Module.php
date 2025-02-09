<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'course_name',
        'batch_no',
        'module_name',
        'study_plan',
        'course_id'
    ];
}
