<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StudyClub;
use Illuminate\Http\Request;

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
}
