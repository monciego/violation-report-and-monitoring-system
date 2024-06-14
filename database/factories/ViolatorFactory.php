<?php

namespace Database\Factories;

use App\Models\StudentInformation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Violator>
 */
class ViolatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $violationDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $violationTime = $this->faker->time('H:i');

        return [
            'student_information_id' => StudentInformation::factory(),
            'violation' => $this->faker->sentence,
            'violation_date' => $violationDate->format('Y-m-d'),
            'violation_time' => $violationTime,
            'status' => 'pending',
            'comment' => $this->faker->optional()->sentence,
        ];
    }
}
