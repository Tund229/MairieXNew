<?php

namespace Database\Seeders;

use App\Models\Mairie;
use App\Models\Region;
use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MairieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departements = Departement::all();

        foreach ($departements as $departement) {
            for ($i = 1; $i <= 1; $i++) {
                Mairie::create([
                    'name' => 'Mairie ' . $i . ' de ' . $departement->name,
                    'departement_id' => $departement->id,
                ]);
            }
        }
    }
}
