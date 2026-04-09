<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['study_club_id', 'title', 'schedule_time', 'location', 'type', 'description'];

    // Agar Laravel otomatis mengubah kolom ini jadi format tanggal (Carbon)
    protected $casts = [
        'schedule_time' => 'datetime',
    ];

    public function studyClub()
    {
        return $this->belongsTo(StudyClub::class);
    }
}
