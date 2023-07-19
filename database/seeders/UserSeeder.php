<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Mechanic One',
            'email' => 'mechanicOne@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

        User::factory()->create([
            'name' => 'Mechanic Two',
            'email' => 'mechanicTwo@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

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
