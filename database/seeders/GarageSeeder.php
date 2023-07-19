<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Garage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GarageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Garage::factory()->count(30)->create();
    }
}
