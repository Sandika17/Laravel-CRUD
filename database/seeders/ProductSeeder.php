<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama sebelum seeding ulang
        Product::truncate();

        // Buat 12 produk dengan stok normal
        Product::factory(12)->create();

        // Buat 3 produk dengan stok habis (untuk testing tampilan stok 0)
        Product::factory(3)->outOfStock()->create();

        $this->command->info('✅ ProductSeeder: 15 produk dummy Air Aqua berhasil dibuat.');
    }
}
