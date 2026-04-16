<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan role-nya dibuat dulu di database
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        $roleCoach = Role::firstOrCreate(['name' => 'coach']);
        $roleSiswa = Role::firstOrCreate(['name' => 'siswa']);

        // 2. Buat User Super Admin
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Cek berdasarkan email
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $superAdmin->assignRole($roleSuperAdmin); // Pasang role-nya!

        // 3. Buat User Coach
        $coach = User::updateOrCreate(
            ['email' => 'coach@guru.com'],
            [
                'name' => 'Bapak Coach Kimia',
                'password' => Hash::make('password'),
            ]
        );
        $coach->assignRole($roleCoach); // Pasang role-nya!

        // 4. Buat User Siswa
        $siswa = User::updateOrCreate(
            ['email' => 'siswa@siswa.com'],
            [
                'name' => 'Siswa Teladan',
                'password' => Hash::make('password'),
            ]
        );
        $siswa->assignRole($roleSiswa); // Pasang role-nya!
    }
}
