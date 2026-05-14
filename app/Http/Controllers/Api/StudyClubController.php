<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StudyClub;
use Illuminate\Http\Request;

class StudyClubController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Jika coach, hanya tampilkan club yang diawasi. Jika admin, tampilkan semua.
        // Asumsi sementara kita ambil semua, tapi jika role = coach difilter
        $query = StudyClub::with(['category', 'coach']);
        
        if ($user && $user->hasRole('coach')) {
            $query->where('coach_id', $user->id);
        }

        $clubs = $query->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $clubs
        ]);
    }

    public function show($id)
    {
        $club = StudyClub::with([
            'category', 
            'coach', 
            'posts', 
            'achievements', 
            'galleries', 
            'schedules', 
            'materials'
        ])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $club
        ]);
    }

    // Untuk Update/Create club bisa disesuaikan nanti jika admin app membutuhkannya
}
