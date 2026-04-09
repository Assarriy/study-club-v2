<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\StudyClub;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua study club yang ada di database
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            // 1. Tambahkan Jadwal Rutin (2 hari dari sekarang)
            Schedule::create([
                'study_club_id' => $club->id,
                'title' => 'Pertemuan Rutin Mingguan',
                'schedule_time' => Carbon::now()->addDays(2)->setTime(15, 30), // Jam 15:30
                'location' => 'Ruang Kelas / Lab Utama',
                'type' => 'rutin',
                'description' => 'Membahas materi dasar dan evaluasi mingguan.',
            ]);

            // 2. Tambahkan Jadwal Lomba (14 hari dari sekarang)
            Schedule::create([
                'study_club_id' => $club->id,
                'title' => 'Simulasi Lomba Tingkat Provinsi',
                'schedule_time' => Carbon::now()->addDays(14)->setTime(8, 00), // Jam 08:00
                'location' => 'Aula Utama Sekolah',
                'type' => 'lomba',
                'description' => 'Wajib hadir bagi anggota inti yang terpilih untuk mewakili sekolah.',
            ]);
        }
    }
}
