<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use Database\Seeders\VoyagerBase\VoyagerDatabaseSeeder;
use Illuminate\Database\Seeder;

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

        User::whereName('admin')->updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role_id' => 1
        ]);

        Service::factory()->create();
    }
}
