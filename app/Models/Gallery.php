<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['study_club_id', 'title', 'type', 'media_path', 'description'];

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
