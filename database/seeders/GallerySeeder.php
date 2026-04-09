<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\StudyClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            // Foto Kegiatan 1
            Gallery::create([
                'study_club_id' => $club->id,
                'title' => 'Dokumentasi Latihan Perdana',
                'type' => 'photo',
                'media_path' => 'galleries/sample-photo.jpg', // Path dummy
                'description' => 'Keseruan anggota saat mengikuti pertemuan pertama tahun ini.',
            ]);

            // Foto Kegiatan 2
            Gallery::create([
                'study_club_id' => $club->id,
                'title' => 'Persiapan Lomba Tahunan',
                'type' => 'photo',
                'media_path' => 'galleries/sample-photo-2.jpg',
                'description' => 'Anggota fokus mendalami materi untuk persiapan kompetisi.',
            ]);

            // Video YouTube
            Gallery::create([
                'study_club_id' => $club->id,
                'title' => 'Video Profil ' . $club->name,
                'type' => 'video',
                'media_path' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Link YouTube dummy
                'description' => 'Cuplikan kegiatan dan pengenalan pengurus club.',
            ]);
        }
    }
}
