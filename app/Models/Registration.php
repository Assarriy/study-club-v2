<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['user_id', 'study_club_id', 'motivation', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
