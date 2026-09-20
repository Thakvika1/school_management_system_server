<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{
    protected $fillable = [
        'group_subject_id',
        'date',
        'date_start',
        'end_time',
        'qr_token',
        'status'
    ];
}
