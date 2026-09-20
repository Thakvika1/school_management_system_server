<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Student;
use App\Models\GroupSubject;


class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    // Group ── hasMany ── Students
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    // Group ── hasMany ── GroupSubjects
    public function groupSubjects(): HasMany
    {
        return $this->hasMany(GroupSubject::class);
    }

    /* Example

    $group = Group::find(1);

    $students = $group->students;
    $assignments = $group->groupSubjects;

    */
}
