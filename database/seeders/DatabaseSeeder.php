<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MairieSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\DepartementSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RegionSeeder::class);
        $this->call(DepartementSeeder::class);
         $this->call(MairieSeeder::class);
        $this->call(UserSeeder::class);



    }
}
