<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@blackfox.com'],
            [
                'name' => 'BlackFox Admin',
                'password' => bcrypt('Admin@123'),
            ]
        );
    }
}