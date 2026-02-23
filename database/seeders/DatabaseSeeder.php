<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Jalankan semua seeder di sini secara berurutan.
     * Gunakan: php artisan db:seed
     * atau:    php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
