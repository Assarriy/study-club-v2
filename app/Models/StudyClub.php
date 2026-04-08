<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyClub extends Model
{
    protected $fillable = [
        'category_id',
        'coach_id',
        'name',
        'slug',
        'description',
        'about',
        'vision',
        'mission',
        'social_links', // Tambahan baru
        'banner_image',
        'is_active'
    ];

    protected $casts = [
        'social_links' => 'array', // Agar otomatis jadi array saat dipanggil
    ];

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'study_club_user');
    }

    // Relasi ke berita
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relasi ke galeri
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
