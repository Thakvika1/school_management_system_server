<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GroupSubject;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    // AttendanceSession ── belongsTo ── GroupSubject
    public function groupSubject(): BelongsTo
    {
        return $this->belongsTo(GroupSubject::class);
    }

    // AttendanceSession ── hasMany ── Attendances
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /* Example
    
    $session = AttendanceSession::find(1);

    $assignment = $session->groupSubject;
    $attendanceRecords = $session->attendances;

    */
}
