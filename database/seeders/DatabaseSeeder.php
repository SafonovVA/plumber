<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Database\Seeders\VoyagerBase\VoyagerDatabaseSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(VoyagerDatabaseSeeder::class);

        $user = User::whereName('admin')->first();
        if (! $user) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'role_id' => 1
            ]);
        }

        $this->call(ImageSeeder::class);
    }
}
