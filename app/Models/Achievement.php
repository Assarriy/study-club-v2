<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['study_club_id', 'title', 'year', 'rank', 'image', 'description'];

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
