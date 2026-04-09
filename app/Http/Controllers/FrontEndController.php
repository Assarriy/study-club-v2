<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Registration;
use App\Models\StudyClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $clubs = StudyClub::with(['category', 'coach'])
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('welcome', compact('categories', 'clubs'));
    }

    public function show($slug)
    {
        $club = StudyClub::with([
            'category',
            'coach',
            'achievements' => function ($query) {
                $query->orderBy('year', 'desc');
            },
            'posts' => function ($query) {
                $query->where('is_published', true)->latest();
            },
            'galleries',
            // Tambahan untuk jadwal (hanya tampilkan jadwal mulai hari ini ke depan)
            'schedules' => function ($query) {
                $query->whereDate('schedule_time', '>=', now())->orderBy('schedule_time', 'asc');
            },
            // Tambahan untuk materi
            'materials' => function ($query) {
                $query->latest();
            }
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('club.show', compact('club'));
    }

    public function register(Request $request, $slug)
    {
        // Validasi input
        $request->validate([
            'motivation' => 'required|string|min:10|max:1000',
        ]);

        $club = StudyClub::where('slug', $slug)->firstOrFail();

        // Cek apakah siswa sudah pernah mendaftar di club ini
        $existingRegistration = Registration::where('user_id', Auth::id())
            ->where('study_club_id', $club->id)
            ->first();

        if ($existingRegistration) {
            return back()->with('error', 'Kamu sudah mendaftar di club ini. Status lamaranmu saat ini: ' . strtoupper($existingRegistration->status));
        }

        // Cek apakah siswa sudah menjadi anggota aktif (ada di tabel study_club_user)
        $isMember = $club->students()->where('user_id', Auth::id())->exists();
        if ($isMember) {
            return back()->with('error', 'Kamu sudah berstatus sebagai anggota aktif di club ini.');
        }

        // Simpan data pendaftaran
        Registration::create([
            'user_id' => Auth::id(),
            'study_club_id' => $club->id,
            'motivation' => $request->motivation,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pendaftaran berhasil dikirim! Silakan tunggu review dan persetujuan dari Coach.');
    }
}
