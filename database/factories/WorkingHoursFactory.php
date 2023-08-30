<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkingHours>
 */
class WorkingHoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'monday_open' => '9:00',
            'monday_close' => '18:00',
            'tuesday_open' => '9:00',
            'tuesday_close' => '18:00',
            'wednesday_open' => '9:00',
            'wednesday_close' => '18:00',
            'thursday_open' => '9:00',
            'thursday_close' => '18:00',
            'friday_open' => '9:00',
            'friday_close' => '18:00',
            'saturday_open' => '9:00',
            'saturday_close' => '18:00',
            'sunday_open' => '9:00',
            'sunday_close' => '18:00',
        ];
    }
}
