<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        // Pastikan ada coach
        $coach = \App\Models\User::firstOrCreate(
            ['email' => 'coach@example.com'],
            [
                'name' => 'Coach Budi',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'phone' => '6281234567890',
            ]
        );
        if (class_exists(\Spatie\Permission\Models\Role::class)) {
            $role = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'coach']);
            if (!$coach->hasRole('coach')) {
                $coach->assignRole($role);
            }
        }

        $kategoriData = [
            ['name' => 'Sains & Teknologi', 'desc' => 'Klub yang berfokus pada pengembangan ilmu pengetahuan alam dan teknologi masa depan.'],
            ['name' => 'Bahasa & Sastra', 'desc' => 'Wadah untuk meningkatkan kemampuan berbahasa, jurnalistik, dan apresiasi karya sastra.'],
            ['name' => 'Seni & Budaya', 'desc' => 'Tempat berkumpulnya siswa berbakat dalam bidang seni rupa, musik, tari, dan teater.'],
            ['name' => 'Olahraga', 'desc' => 'Klub pembinaan jasmani dan mental melalui berbagai cabang olahraga kompetitif.'],
            ['name' => 'Matematika', 'desc' => 'Pengembangan logika dan kemampuan berhitung untuk persiapan olimpiade akademik.']
        ];

        $clubData = [
            'Sains & Teknologi' => ['Klub Robotik', 'Kelompok Ilmiah Remaja (KIR)'],
            'Bahasa & Sastra' => ['English Debating Society', 'Klub Jurnalistik'],
            'Seni & Budaya' => ['Teater Smanila', 'Paduan Suara'],
            'Olahraga' => ['Basket Ball Club', 'Futsal Academy'],
            'Matematika' => ['Olimpiade Matematika', 'Matematika Menyenangkan']
        ];

        $achievementsData = [
            'Juara 1 Tingkat Nasional', 'Medali Emas Olimpiade', 'Juara 2 Tingkat Provinsi', 
            'Juara Harapan 1 Lomba Antar Sekolah', 'Best Speaker Tingkat Regional', 'Juara Umum Festival Tahunan'
        ];

        $materialsData = [
            'Modul Pelatihan Dasar', 'Kumpulan Soal Latihan Lanjutan', 'Materi Presentasi Workshop', 
            'Panduan Praktik Lapangan', 'Silabus Kegiatan Tahunan'
        ];

        $postsData = [
            ['title' => 'Persiapan Menuju Kompetisi Nasional', 'content' => 'Dalam rangka menghadapi kompetisi tingkat nasional bulan depan, seluruh anggota klub diwajibkan mengikuti pemusatan latihan intensif setiap akhir pekan. Diharapkan partisipasi aktif dari semua anggota.'],
            ['title' => 'Penerimaan Anggota Baru Telah Dibuka', 'content' => 'Kami mengundang siswa-siswi yang memiliki minat dan bakat untuk bergabung bersama kami. Dapatkan pengalaman berharga, relasi baru, dan sertifikat kegiatan yang berguna untuk masa depan.'],
            ['title' => 'Evaluasi Program Kerja Semester Ganjil', 'content' => 'Pertemuan rutin kali ini akan membahas pencapaian dan evaluasi program kerja yang telah dijalankan selama semester ganjil. Kami juga akan merencanakan kegiatan seru untuk semester depan.'],
            ['title' => 'Tips dan Trik Lolos Seleksi Tim Inti', 'content' => 'Bagi anggota yang ingin masuk ke dalam tim inti untuk perlombaan mendatang, pastikan kalian menguasai materi dasar dan menunjukkan komitmen kehadiran yang tinggi selama latihan.'],
            ['title' => 'Kunjungan Studi Banding ke Universitas', 'content' => 'Bulan depan kita akan mengadakan kunjungan studi banding ke salah satu universitas terkemuka untuk melihat langsung penerapan ilmu yang telah kita pelajari di klub ini. Jangan sampai terlewat!']
        ];

        $schedulesData = [
            ['title' => 'Latihan Rutin Mingguan', 'type' => 'offline', 'desc' => 'Latihan dan evaluasi kemampuan anggota.'],
            ['title' => 'Simulasi Perlombaan', 'type' => 'offline', 'desc' => 'Uji coba mental dan kemampuan jelang lomba.'],
            ['title' => 'Pertemuan Daring Bulanan', 'type' => 'online', 'desc' => 'Diskusi teori dan pemantapan materi via Zoom.'],
            ['title' => 'Workshop Internal', 'type' => 'offline', 'desc' => 'Pemberian materi oleh pemateri tamu.'],
            ['title' => 'Rapat Evaluasi Pengurus', 'type' => 'online', 'desc' => 'Evaluasi kinerja kepengurusan bulan ini.']
        ];

        // 1. Create Categories
        $categories = [];
        foreach ($kategoriData as $kat) {
            $categories[$kat['name']] = \App\Models\Category::create([
                'name' => $kat['name'],
                'slug' => \Illuminate\Support\Str::slug($kat['name']) . '-' . uniqid(),
                'description' => $kat['desc'],
            ]);
        }

        // 2. Create Study Clubs
        $studyClubs = [];
        foreach ($clubData as $katName => $clubs) {
            foreach ($clubs as $clubName) {
                $studyClubs[] = \App\Models\StudyClub::create([
                    'category_id' => $categories[$katName]->id,
                    'coach_id' => $coach->id,
                    'name' => $clubName,
                    'slug' => \Illuminate\Support\Str::slug($clubName) . '-' . uniqid(),
                    'description' => 'Klub ' . $clubName . ' adalah wadah bagi siswa untuk mengembangkan potensi terbaik mereka.',
                    'about' => 'Kami memiliki visi untuk mencetak generasi yang kompeten, berakhlak mulia, dan mampu bersaing di tingkat nasional maupun internasional.',
                    'vision' => 'Menjadi klub terbaik dan paling berprestasi di tingkat nasional.',
                    'mission' => 'Mengadakan pelatihan rutin, mengikuti berbagai kompetisi, dan membangun relasi yang kuat antar anggota.',
                    'social_links' => ['instagram' => 'https://instagram.com/club', 'website' => 'https://example.com'],
                    'is_active' => true,
                ]);
            }
        }

        // 3. Create Related Models
        foreach ($studyClubs as $club) {
            for ($i = 0; $i < 5; $i++) {
                \App\Models\Achievement::create([
                    'study_club_id' => $club->id,
                    'title' => $faker->randomElement($achievementsData) . ' ' . $faker->year(),
                    'year' => $faker->numberBetween(2020, 2024),
                    'rank' => 'Juara ' . rand(1, 3),
                    'description' => 'Pencapaian luar biasa yang diraih oleh perwakilan klub dengan penuh perjuangan dan dedikasi.',
                ]);

                \App\Models\Gallery::create([
                    'study_club_id' => $club->id,
                    'title' => 'Dokumentasi ' . $faker->randomElement(['Latihan', 'Lomba', 'Workshop', 'Rapat', 'Kunjungan']),
                    'type' => 'photo',
                    'media_path' => 'galleries/dummy.jpg',
                    'description' => 'Momen berharga kebersamaan anggota klub.',
                ]);

                \App\Models\Material::create([
                    'study_club_id' => $club->id,
                    'title' => $faker->randomElement($materialsData),
                    'file_path' => 'materials/dummy.pdf',
                    'description' => 'Silakan diunduh dan dipelajari untuk persiapan pertemuan selanjutnya.',
                ]);

                $post = $postsData[$i];
                \App\Models\Post::create([
                    'study_club_id' => $club->id,
                    'title' => $post['title'],
                    'slug' => \Illuminate\Support\Str::slug($post['title']) . '-' . uniqid(),
                    'content' => $post['content'],
                    'is_published' => true,
                ]);

                $schedule = $schedulesData[$i];
                \App\Models\Schedule::create([
                    'study_club_id' => $club->id,
                    'title' => $schedule['title'],
                    'schedule_time' => clone $faker->dateTimeBetween('now', '+1 month'),
                    'location' => $schedule['type'] == 'online' ? 'Zoom / Google Meet' : 'Ruang ' . rand(101, 305),
                    'type' => $schedule['type'],
                    'description' => $schedule['desc'],
                ]);
            }
        }
    }
}
