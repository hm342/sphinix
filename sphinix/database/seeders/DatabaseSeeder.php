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
        $adminEmail = env('ADMIN_EMAIL', 'admin@sphinixmarketing.com');
        $adminPassword = env('ADMIN_PASSWORD', 'Sphinix@2026');

        User::query()->updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => 'Sphinix Admin',
                'password' => Hash::make($adminPassword),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]
        );

        $this->call([
            AgencyContentSeeder::class,
        ]);
    }
}
