<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'teacher_code',
    ];

    // Teacher ── belongsTo ── User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Teacher ── hasMany ── GroupSubject
    public function groupSubjects(): HasMany
    {
        return $this->hasMany(GroupSubject::class);
    }

    /* Example

    $teacher = Teacher::find(1);

    $user = $teacher->user;
    $assignments = $teacher->groupSubjects;

    */
}
