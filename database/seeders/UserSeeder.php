<?php

namespace Database\Seeders;

use App\Enum\AppointmentStatusEnum;
use App\Models\Garage;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Admin Account
         */
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('admin');

        /**
         * Client Accounts
         */
        $clientOne = User::factory()->create([
            'name' => 'Client One',
            'email' => 'clientOne@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');

        $clientTwo = User::factory()->create([
            'name' => 'Client Two',
            'email' => 'clientTwo@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');

        User::factory()->create([
            'name' => 'Client Three',
            'email' => 'clientThree@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');

        User::factory()->create([
            'name' => 'Client Four',
            'email' => 'clientFour@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('client');

        /**
         * Garage Owner Accounts
         */
        $mechanicOne = User::factory()->create([
            'name' => 'Mechanic One',
            'email' => 'mechanicOne@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

        $garageOne = Garage::factory()->create([
            'name' => 'Garage One',
        ]);

        $mechanicOne->garage()->save($garageOne);

        Review::factory()->count(5)->for($clientOne, 'client')->for($garageOne, 'garage')->create();

        // TODO: Make Appointment factory
        $appointmentOne = $mechanicOne->garage->appointments()->make([
            'subject' => 'Appointment One',
            'request_description' => 'Change my tires',
            'start_datetime' => Carbon::now()->addDays(3),
            'status' => AppointmentStatusEnum::REQUESTED,
        ]);

        $appointmentOne->client()->associate($clientOne);
        $appointmentOne->save();

        $mechanicTwo = User::factory()->create([
            'name' => 'Mechanic Two',
            'email' => 'mechanicTwo@pitbox.com',
            'password' => Hash::make('demo'),
        ])->assignRole('mechanic');

        $garageTwo = Garage::factory()->create([
            'name' => 'Garage Two',
        ]);

        $mechanicTwo->garage()->save($garageTwo);

        Review::factory()->count(5)->for($clientTwo, 'client')->for($garageTwo, 'garage')->create();

        // TODO: Make Appointment factory
        $appointmentTwo = $mechanicTwo->garage->appointments()->make([
            'subject' => 'Appointment Two',
            'request_description' => 'Perform an oil change',
            'start_datetime' => Carbon::now()->addDays(3),
            'status' => AppointmentStatusEnum::REQUESTED,
        ]);

        $appointmentTwo->client()->associate($clientTwo);
        $appointmentTwo->save();
    }
}
