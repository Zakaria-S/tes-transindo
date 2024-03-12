<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Muhamad Zakaria Saputra',
                'email' => 'zakaria@example.com',
                'no_telp' => '089876543210',
                'no_sim' => '12345678902345',
                'password' => '1234567890',
            ],
            [
                'nama' => 'Hanifah Muslimah',
                'email' => 'hanifah@example.com',
                'no_telp' => '089876543211',
                'no_sim' => '12345678903456',
                'password' => '1234567890',
            ],
            [
                'nama' => 'Dani Ramdan',
                'email' => 'dani@example.com',
                'no_telp' => '089876543212',
                'no_sim' => '12345678904567',
                'password' => '1234567890',
            ],
            [
                'nama' => 'Grace Sihombing',
                'email' => 'grace@example.com',
                'no_telp' => '089876543213',
                'no_sim' => '12345678905678',
                'password' => '1234567890',
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
