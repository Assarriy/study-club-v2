<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\StudyClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            Material::create([
                'study_club_id' => $club->id,
                'title' => 'Modul Pengantar & Silabus',
                // Ingat: ini hanya path teks dummy. Jika nanti di-download di web akan error 404
                // karena file fisiknya belum benar-benar kamu upload ke folder storage/app/public/materials
                'file_path' => 'materials/modul-dummy.pdf',
                'description' => 'Silakan pelajari modul dan silabus ini sebelum pertemuan pertama dimulai.',
            ]);

            Material::create([
                'study_club_id' => $club->id,
                'title' => 'Bank Soal Latihan Tahun Lalu',
                'file_path' => 'materials/soal-dummy.pdf',
                'description' => 'Kumpulan soal untuk latihan mandiri di rumah.',
            ]);
        }
    }
}
