<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssingmentModel extends Model
{
    protected $fillable = [
        'course_name',
        'batch_no',
        'module_name',
        'course_id',
        'assing_name',
        'deadline',
        'imLink',
        'details',
        'ex_1',
        'ex_2',
        'status',
    ];
}
