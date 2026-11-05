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
    // query bilder, DB
    // eloquent / ORM :
    public function run(): void
    {
        // firstOrCreate supaya seeder bisa dijalankan berkali-kali tanpa error email duplikat
        // (dan password admin yang sudah diganti tidak ikut ter-reset)
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => '12345678',
            ]
        );
    }
}
