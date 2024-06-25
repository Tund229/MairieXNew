<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            'Dakar',
            'Thiès',
            'Saint-Louis',
            'Diourbel',
            'Louga',
            'Fatick',
            'Kaolack',
            'Kaffrine',
            'Kédougou',
            'Tambacounda',
            'Ziguinchor',
            'Kolda',   
            'Matam',   
            'Sédhiou',  
        ];
        

        foreach ($regions as $regionName) {
            Region::create(['name' => $regionName]);
        }
    }
}
