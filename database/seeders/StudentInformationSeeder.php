<?php

namespace Database\Seeders;

use App\Models\StudentInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentInformation::factory()->count(20)->create();
    }
}
