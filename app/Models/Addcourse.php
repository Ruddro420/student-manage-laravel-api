<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addcourse extends Model
{
    protected $fillable = [
        'course_name',
        'batch_no',
        'batch_status',
        'status'
    ];
}
