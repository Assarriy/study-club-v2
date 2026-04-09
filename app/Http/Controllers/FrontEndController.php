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
        // Mengambil data club berdasarkan slug URL, beserta semua relasinya
        $club = StudyClub::with([
            'category',
            'coach',
            'achievements' => function ($query) {
                $query->orderBy('year', 'desc'); // Urutkan prestasi dari yang terbaru
            },
            'posts' => function ($query) {
                $query->where('is_published', true)->latest(); // Hanya ambil berita yang di-publish
            },
            'galleries'
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('club.show', compact('club'));
    }
}
