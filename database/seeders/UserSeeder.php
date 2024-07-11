<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => "Dénis Coly",
            'phone' => "+221 78 473 76 71",
            'role' => "admin",
            'email' => "deniscoly19@gmail.com",
            'password' => Hash::make('123456789'),
        ]);

        DB::table('users')->insert([
            'name' => "Dénis Test",
            'phone' => "+221 78 403 76 71",
            'role' => "agent",
            'email' => "test@testo.com",
            'password' => Hash::make('123456789'),
        ]);



    }
}
