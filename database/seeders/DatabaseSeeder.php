<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $email = config('app.super_admin_email');
        $password = config('app.super_admin_password');
        if (!User::where('role', 'super_admin')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]);
        }
        $this->call(StreamsSeeder::class);
    }
}
