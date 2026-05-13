<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Registration;
use App\Models\StudyClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontEndController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $search = $request->query('search');

        $query = StudyClub::with(['category', 'coach'])
            ->where('is_active', true);

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        $clubs = $query->latest()->paginate(1)->withQueryString();

        // Support design variant switching via ?design=1|2|3|noir|mono|slate
        $design = $request->query('design');
        if (in_array($design, ['1', '2', '3'])) {
            return view("pages.landing-v{$design}", compact('categories', 'clubs'));
        }

        // Linear-inspired design options
        $linearDesigns = ['noir', 'mono', 'slate'];
        if (in_array($design, $linearDesigns)) {
            return view("pages.landing-{$design}", compact('categories', 'clubs'));
        }

        return view('pages.landing', compact('categories', 'clubs'));
    }

    public function show(Request $request, $slug)
    {
        $club = StudyClub::with([
            'category',
            'coach',
        ])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = Registration::where('user_id', Auth::id())
                                ->where('study_club_id', $club->id)
                                ->exists();
        }

        $tab = $request->query('tab', 'home');
        
        if ($tab === 'news') {
            $posts = $club->posts()->where('is_published', true)->latest()->paginate(6, ['*'], 'posts_page')->withQueryString();
            $achievements = $club->achievements()->orderBy('year', 'desc')->paginate(6, ['*'], 'ach_page')->withQueryString();
            return view('pages.detail-news', compact('club', 'isRegistered', 'posts', 'achievements'));
        } elseif ($tab === 'gallery') {
            $galleries = $club->galleries()->latest()->paginate(12)->withQueryString();
            return view('pages.detail-gallery', compact('club', 'isRegistered', 'galleries'));
        } elseif ($tab === 'academic') {
            $schedules = $club->schedules()->whereDate('schedule_time', '>=', now())->orderBy('schedule_time', 'asc')->paginate(10, ['*'], 'sch_page')->withQueryString();
            $materials = $club->materials()->latest()->paginate(10, ['*'], 'mat_page')->withQueryString();
            return view('pages.detail-academic', compact('club', 'isRegistered', 'schedules', 'materials'));
        }

        return view('pages.detail', compact('club', 'isRegistered'));
    }

    public function showPost($slug, $postSlug)
    {
        $club = StudyClub::where('slug', $slug)->firstOrFail();
        $post = \App\Models\Post::where('study_club_id', $club->id)->where('slug', $postSlug)->firstOrFail();

        $isRegistered = false;
        if (Auth::check()) {
            $isRegistered = Registration::where('user_id', Auth::id())
                                ->where('study_club_id', $club->id)
                                ->exists();
        }

        return view('pages.post-detail', compact('club', 'post', 'isRegistered'));
    }

    public function showAchievement($slug, $id)
    {
        $club = StudyClub::where('slug', $slug)->firstOrFail();
        $achievement = \App\Models\Achievement::where('study_club_id', $club->id)->findOrFail($id);
        return view('pages.achievement-detail', compact('club', 'achievement'));
    }

    public function register(Request $request, $slug)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect('/admin/login')->with('error', 'Silakan login terlebih dahulu untuk mendaftar.');
        }

        $request->validate([
            'motivation' => 'required|string|min:10|max:1000',
        ]);

        $club = StudyClub::with('coach')->where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        // Validate coach phone exists and is properly formatted
        if (!$club->coach || !$club->coach->phone) {
            Log::warning('Registration failed: Coach has no phone', [
                'study_club_id' => $club->id,
                'coach_id' => $club->coach_id,
                'user_id' => $user->id,
            ]);
            return back()->with('error', 'Coach club belum mengatur nomor WhatsApp. Silakan hubungi admin.');
        }

        $coachPhone = $club->coach->phone;

        // Validate phone format: must be 10-13 digits, start with 62 or 0
        if (!$this->isValidPhoneNumber($coachPhone)) {
            Log::error('Registration failed: Invalid coach phone format', [
                'study_club_id' => $club->id,
                'coach_id' => $club->coach_id,
                'phone' => $coachPhone,
            ]);
            return back()->with('error', 'Nomor WhatsApp coach tidak valid. Silakan hubungi admin.');
        }

        // Cek duplikasi pendaftaran
        $existing = Registration::where('user_id', $user->id)->where('study_club_id', $club->id)->first();
        if ($existing) {
            return back()->with('error', 'Kamu sudah mendaftar di club ini.');
        }

        try {
            // Simpan ke Database
            Registration::create([
                'user_id' => $user->id,
                'study_club_id' => $club->id,
                'motivation' => $request->motivation,
                'status' => 'pending',
            ]);

            // Normalize phone number: ensure it starts with 62
            if (str_starts_with($coachPhone, '0')) {
                $coachPhone = '62' . substr($coachPhone, 1);
            } elseif (!str_starts_with($coachPhone, '62')) {
                $coachPhone = '62' . $coachPhone;
            }

            $message = "Halo Coach *" . $club->coach->name . "*,\n\n";
            $message .= "Saya *" . $user->name . "* ingin mendaftar ke Study Club *" . $club->name . "*.\n\n";
            $message .= "*Motivasi:* \n" . $request->motivation . "\n\n";
            $message .= "Mohon untuk ditinjau pendaftaran saya di sistem melalui link berikut:\n";
            $message .= \App\Filament\Resources\StudyClubs\StudyClubResource::getUrl('edit', ['record' => $club->id]) . "\n\nTerima kasih!";

            // Encode pesan agar aman untuk URL
            $waUrl = "https://api.whatsapp.com/send?phone=" . $coachPhone . "&text=" . urlencode($message);

            // Redirect ke WhatsApp
            return redirect()->away($waUrl);
        } catch (\Exception $e) {
            Log::error('Registration error', [
                'study_club_id' => $club->id,
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
            return back()->with('error', 'Terjadi kesalahan saat memproses pendaftaran. Silakan coba lagi.');
        }
    }

    /**
     * Validate Indonesian phone number format
     * Accepts: 089XXXXXXXX, +6289XXXXXXXX, 62XXXXXXXX (10-13 digits total)
     */
    private function isValidPhoneNumber($phone): bool
    {
        // Remove any non-digit characters except leading +
        $phone = preg_replace('/[^\d\+]/', '', $phone);

        // Remove + if present
        $phone = ltrim($phone, '+');

        // Must start with 0 or 62
        if (!str_starts_with($phone, '0') && !str_starts_with($phone, '62')) {
            return false;
        }

        // Convert 0 to 62
        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        // Must be 10-13 digits after normalization
        return strlen($phone) >= 10 && strlen($phone) <= 13 && preg_match('/^\d+$/', $phone);
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');

        $clubs = StudyClub::with(['category', 'coach'])
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                    ->orWhere('slug', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'like', "%$query%");
                    });
            })
            ->take(10)
            ->get();

        return response()->json($clubs);
    }

    public function filterByCategory(Request $request, $categoryId = null)
    {
        $query = StudyClub::with(['category', 'coach'])->where('is_active', true);

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $clubs = $query->latest()->get();

        return response()->json($clubs);
    }
}
