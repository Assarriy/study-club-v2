<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = ['study_club_id', 'title', 'file_path', 'description'];

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
