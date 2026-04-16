<?php

namespace Database\Seeders;

use App\Models\StudyClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyClubProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = StudyClub::all();

        foreach ($clubs as $club) {
            $club->update([
                'about' => '<p>Selamat datang di <strong>' . $club->name . '</strong>! Kami adalah komunitas siswa yang bersemangat untuk mengeksplorasi dan mendalami ilmu di bidang ' . $club->category->name . ' secara interaktif dan menyenangkan. Di sini, kamu tidak hanya belajar teori, tapi juga praktik dan simulasi langsung.</p>',

                'vision' => '<p>Menjadi pusat keunggulan dan inovasi siswa dalam bidang ' . $club->category->name . ' di tingkat nasional yang berwawasan teknologi.</p>',

                'mission' => '<ul><li>Membangun budaya belajar yang kritis, logis, dan kolaboratif.</li><li>Mengembangkan potensi setiap anggota melalui mentor yang ahli.</li><li>Turut serta aktif dalam berbagai kompetisi bergengsi.</li></ul>',

                'social_links' => [
                    'Instagram' => 'https://instagram.com/studyclub_idn',
                    'Google Drive' => 'https://drive.google.com',
                    'Grup WhatsApp' => 'https://chat.whatsapp.com/dummy-link-aja',
                ],
            ]);
        }
    }
}
