<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\StudyClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            // Prestasi 1 (Terbaru)
            Achievement::create([
                'study_club_id' => $club->id,
                'title' => 'Juara 1 Olimpiade ' . $club->category->name . ' Provinsi',
                'year' => '2025',
                'rank' => 'Juara 1',
                'description' => 'Berhasil meraih medali emas menyisihkan 150 peserta dari sekolah lain.',
            ]);

            // Prestasi 2 (Tahun Lalu)
            Achievement::create([
                'study_club_id' => $club->id,
                'title' => 'Finalis Lomba Inovasi Nasional',
                'year' => '2024',
                'rank' => 'Top 10',
                'description' => 'Masuk nominasi 10 besar karya terbaik tingkat nasional.',
            ]);
        }
    }
}
