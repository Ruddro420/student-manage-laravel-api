<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceModel extends Model
{
    protected $fillable = [
        'course_name',
        'batch_no',
        'module_name',
        'course_id',
        'name',
        'link',
        'date',
        'details',
        'ex_1',
        'ex_2',
        'status',
    ];
}
