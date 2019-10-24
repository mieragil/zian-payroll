<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = [
        'emp_id', 'reason', 'date', 'minutes', 'status'
    ];
}
