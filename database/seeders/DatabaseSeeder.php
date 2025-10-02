<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        User::factory()->roles(['SuperAdmin'])->create([
            'name' => 'Super',
            'email' => 'super@domain.com',
        ]);

        User::factory(10)->roles(['Publisher'])->create();

        $this->call([
            CategorySeeder::class,
            PhotoSeeder::class,
        ]);
    }
}
