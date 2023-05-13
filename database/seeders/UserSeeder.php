<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'email' => 'admin@mail.com',
            'tipe' => 'admin',
            'password' => bcrypt('admin123')
        ])->assignRole('admin');

        // User::create([
        //     // 'name' => 'Saya Guru',
        //     'email' => 'guru@gmail.com',
        //     'tipe' => 'guru',
        //     'password' => bcrypt('guru123')
        // ])->assignRole('guru');

        // User::create([
        //     // 'name' => 'Saya Siswa',
        //     'email' => 'siswa@gmail.com',
        //     'tipe' => 'siswa',
        //     'password' => bcrypt('siswa123')
        // ])->assignRole('siswa');
    }
}
