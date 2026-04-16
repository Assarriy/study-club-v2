<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi ke Study Club (sebagai Anggota)
    public function studyClubs()
    {
        return $this->belongsToMany(StudyClub::class, 'study_club_user');
    }

    // Relasi ke tabel Pendaftaran (Antrean)
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // --- FILAMENT GATEKEEPER ---
    public function canAccessPanel(Panel $panel): bool
    {
        // Buka gerbang untuk 3 role ini
        return $this->hasRole(['super_admin', 'coach', 'siswa']);
    }
}