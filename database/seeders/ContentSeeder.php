<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jumlah konten yang ingin dibuat
        $jumlah = 10;

        for ($i = 0; $i < $jumlah; $i++) {
            DB::table('contents')->insert([
                'site_id' => 2,
                'title' => fake()->sentence(),
                'body' => fake()->paragraphs(3, true),
                'image' => 'default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
