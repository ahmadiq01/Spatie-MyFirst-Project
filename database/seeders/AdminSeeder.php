<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => ('password'),
    ]);
        $user->assignRole('writer','admin');
    }
}
