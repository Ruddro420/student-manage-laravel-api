<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitAssingment extends Model
{
    protected $fillable = ['s_name', 's_id', 'c_name', 'batch_no', 's_phone', 'a_name', 'a_link', 'm_name', 'sub_date', 'ex_1', 'ex_2', 'status'];
}
