<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['study_club_id', 'title', 'slug', 'image', 'content', 'is_published'];

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
