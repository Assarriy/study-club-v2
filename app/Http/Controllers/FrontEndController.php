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
}
