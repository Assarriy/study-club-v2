<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create(['name' => 'Super Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('password')]);
        $admin->assignRole('super_admin');

        $coach = User::create(['name' => 'Coach Kimia', 'email' => 'coach@coach.com', 'password' => Hash::make('password')]);
        $coach->assignRole('coach');

        $student = User::create(['name' => 'Siswa', 'email' => 'siswa@siswa.com', 'password' => Hash::make('password')]);
        $student->assignRole('student');
    }
}
