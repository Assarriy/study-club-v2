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
        $request->validate([
            'motivation' => 'required|string|min:10|max:1000',
        ]);

        $club = StudyClub::with('coach')->where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        // Cek duplikasi pendaftaran (sama seperti sebelumnya)
        $existing = Registration::where('user_id', $user->id)->where('study_club_id', $club->id)->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah mendaftar di club ini.');
        }

        // Simpan ke Database
        Registration::create([
            'user_id' => $user->id,
            'study_club_id' => $club->id,
            'motivation' => $request->motivation,
            'status' => 'pending',
        ]);

        // --- LOGIK WHATSAPP ---
        $coachPhone = $club->coach->phone ?? '628123456789'; // Nomor default jika coach belum isi HP

        // Pastikan nomor diawali 62 bukan 0
        if (str_starts_with($coachPhone, '0')) {
            $coachPhone = '62' . substr($coachPhone, 1);
        }

        $message = "Halo Coach *" . $club->coach->name . "*,\n\n";
        $message .= "Saya *" . $user->name . "* ingin mendaftar ke Study Club *" . $club->name . "*.\n\n";
        $message .= "*Motivasi:* \n" . $request->motivation . "\n\n";
        $message .= "Mohon untuk ditinjau pendaftaran saya di sistem. Terima kasih!";

        // Encode pesan agar aman untuk URL
        $waUrl = "https://api.whatsapp.com/send?phone=" . $coachPhone . "&text=" . urlencode($message);

        // Redirect ke WhatsApp
        return redirect()->away($waUrl);
    }
}
