<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Admin Sewa Mobil',
            'email' => 'admin@example.com',
            'no_telp' => '081234567890',
            'no_sim' => '12345678901234',
            'password' => '1234567890',
            'role' => 'admin'
        ]);
    }
}
