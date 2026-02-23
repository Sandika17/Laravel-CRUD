<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama
        User::truncate();

        // Akun admin untuk testing (kredensial sudah diketahui)
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Beberapa akun dummy tambahan
        User::factory(4)->create();

        $this->command->info('✅ UserSeeder: 1 akun admin + 4 akun dummy berhasil dibuat.');
        $this->command->line('   📧 Login: admin@example.com | 🔑 Password: password');
    }
}
