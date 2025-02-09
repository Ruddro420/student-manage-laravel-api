<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecordingModel extends Model
{
    protected $fillable = [
        'course_name',
        'batch_no',
        'module_name',
        'course_id',
        'record_type',
        'record_name',
        'vLink',
        'date',
        'details',
        'ex_1',
        'ex_2',
        'status',
    ];
}
