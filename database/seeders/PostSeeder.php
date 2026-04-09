<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\StudyClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            // Berita 1: Pembukaan Pendaftaran
            Post::create([
                'study_club_id' => $club->id,
                'title' => 'Pendaftaran Anggota Baru ' . $club->name . ' Resmi Dibuka!',
                'slug' => Str::slug('Pendaftaran Anggota Baru ' . $club->name . ' Resmi Dibuka ' . $club->id),
                'image' => null, // Biarkan null atau isi path dummy
                'content' => '<p>Halo para siswa! Kami mengundang kalian untuk bergabung dan berkembang bersama kami. Segera daftarkan diri kalian melalui portal pendaftaran sebelum kuota penuh.</p>',
                'is_published' => true,
            ]);

            // Berita 2: Info Kegiatan
            Post::create([
                'study_club_id' => $club->id,
                'title' => 'Update Jadwal Latihan Mingguan',
                'slug' => Str::slug('Update Jadwal Latihan Mingguan ' . $club->name . ' ' . $club->id),
                'image' => null,
                'content' => '<p>Diberitahukan kepada seluruh anggota bahwa mulai minggu depan, latihan rutin akan dilaksanakan setiap hari Rabu pukul 15.30 di Lab Utama.</p>',
                'is_published' => true,
            ]);

            // Berita 3: Prestasi
            Post::create([
                'study_club_id' => $club->id,
                'title' => 'Selamat! Tim ' . $club->name . ' Meraih Juara di Kompetisi Regional',
                'slug' => Str::slug('Tim ' . $club->name . ' Meraih Juara ' . $club->id),
                'image' => null,
                'content' => '<p>Kabar gembira! Berkat kerja keras dan dedikasi, tim kita berhasil membawa pulang piala juara. Terima kasih atas dukungan teman-teman semua.</p>',
                'is_published' => true,
            ]);
        }
    }
}
