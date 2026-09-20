<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\GroupSubject;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Subject ── hasMany ── GroupSubjects
    public function groupSubjects(): HasMany
    {
        return $this->hasMany(GroupSubject::class);
    }

    /* Example

    $subject = Subject::find(1);

    $assignments = $subject->groupSubjects;

    */
}
