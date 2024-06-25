<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = Region::all();

        foreach ($regions as $region) {
            for ($i = 1; $i <= 1; $i++) {
                Departement::create([
                    'name' => 'Département ' . $i . ' de ' . $region->name,
                    'region_id' => $region->id,
                ]);
            }
        }
    }
}
