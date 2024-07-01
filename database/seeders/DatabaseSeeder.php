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
        $this->call(StudentInformationSeeder::class);
        $this->call(ViolatorSeeder::class);

        $superadministrator = User::factory()->create([
            'name' => "Ma'am Belinda Martinez",
            'email' => 'superadministrator@gwc.com',
            'password' => Hash::make('superadministrator@gwc.com'),
        ]);

        $superadministrator->addRole('superadministrator');

        $guard = User::factory()->create([
            'name' => "Guard",
            'email' => 'guard@gwc.com',
            'password' => Hash::make('guard@gwc.com'),
        ]);

        $guard->addRole('guard');

        $encoder = User::factory()->create([
            'name' => "Encoder",
            'email' => 'encoder@gwc.com',
            'department' => 'Information Technology Department',
            'password' => Hash::make('encoder@gwc.com'),
        ]);

        $encoder->addRole('encoder');

        $college_dean = User::factory()->create([
            'name' => "Dean",
            'email' => 'dean@gwc.com',
            'department' => 'Information Technology Department',
            'password' => Hash::make('dean@gwc.com'),
        ]);

        $college_dean->addRole('college_dean');
    }
}
