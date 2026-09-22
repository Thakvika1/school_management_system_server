<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Group;
use App\Models\Attendance;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'user_id',
        'student_code',
        'group_id',
        'year',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }

    // Student ── belongsTo ── User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Student ── belongsTo ── Group
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
    
    // Student ── hasMany ── Attendances
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    /* Example

    $student = Student::find(1);

    $user = $student->user;
    $group = $student->group;
    $attendanceRecords = $student->attendances;

    */
}
