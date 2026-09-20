<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\AttendanceSession;

class GroupSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'subject_id',
        'teacher_id',
    ];

    // GroupSubject ── belongsTo ── Group
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    // GroupSubject ── belongsTo ── Subject
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    // GroupSubject ── belongsTo ── Teacher
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    // GroupSubject ── hasMany ── AttendanceSessions
    public function attendanceSessions(): HasMany
    {
        return $this->hasMany(AttendanceSession::class);
    }

    /* Example

    $assignment = GroupSubject::find(1);

    $group = $assignment->group;
    $subject = $assignment->subject;
    $teacher = $assignment->teacher;
    $sessions = $assignment->attendanceSessions;


    You can also load the assignment details together:
    $assignment = GroupSubject::with([
        'group',
        'subject',
        'teacher.user',
    ])->find(1);

    */
}
