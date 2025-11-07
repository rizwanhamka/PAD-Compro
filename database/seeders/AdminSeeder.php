<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'rizwan@mail.com'],
            [
                'name' => 'Rizwan',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
