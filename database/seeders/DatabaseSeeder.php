<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder homepage
        $this->call([
            HomepageSeeder::class,
        ]);
    }
}
