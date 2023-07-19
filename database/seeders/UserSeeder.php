<?php

namespace Database\Seeders;

use App\Models\Garage;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('admin');

        $mechanicOne = User::factory()->create([
            'name' => 'Mechanic One',
            'email' => 'mechanicOne@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

        $garageOne = Garage::factory()->create([
            'name' => 'Garage One',
        ]);

        $mechanicOne->garage()->save($garageOne);

        $mechanicTwo = User::factory()->create([
            'name' => 'Mechanic Two',
            'email' => 'mechanicTwo@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

        $garageTwo = Garage::factory()->create([
            'name' => 'Garage Two',
        ]);

        $mechanicTwo->garage()->save($garageTwo);

        User::factory()->create([
            'name' => 'Client One',
            'email' => 'clientOne@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');

        User::factory()->create([
            'name' => 'Client Two',
            'email' => 'clientTwo@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');
    }
}
