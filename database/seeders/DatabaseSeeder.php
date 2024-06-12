<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        $superadministrator = User::factory()->create([
            'name' => "Ma'am Belinda Martinez",
            'email' => 'superadministrator@gwc.com',
            'password' => Hash::make('superadministrator@gwc.com'),
        ]);

        $superadministrator->addRole('superadministrator');
    }
}
