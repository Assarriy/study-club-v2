<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'color_theme', 'description'];

    public function studyClubs()
    {
        return $this->hasMany(StudyClub::class);
    }
}