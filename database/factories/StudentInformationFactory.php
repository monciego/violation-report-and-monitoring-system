<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentInformation>
 */
class StudentInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthdate = $this->faker->dateTimeBetween('-30 years', '-18 years');
        $age = Carbon::parse($birthdate)->age;

        return [
            'student_id' => $this->faker->numberBetween(10000, 99999),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'department' => $this->faker->randomElement([
                'Education Department',
                'Information Technology Department',
                'Business Education Department',
                'Criminology Department'
            ]),
            'year_course' => $this->faker->numberBetween(1, 4),
            'address' => $this->faker->address,
            'contact_number' => $this->faker->phoneNumber,
            'birthdate' => $birthdate,
            'age' => $age,
            'name_of_guardian' => $this->faker->optional()->name,
            'guardian_contact_number' => $this->faker->optional()->phoneNumber,
        ];
    }
}
