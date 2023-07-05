<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CampusSeeder;
use Database\Seeders\VendorSeeder;
use Database\Seeders\FacultySeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\ComplaincategorySeeder;
use Database\Seeders\ComplaincategorytypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesAndPermissionsSeeder::class]);
        // $this->call([UserSeeder::class]);
        $this->call([CampusSeeder::class]);
        $this->call([FacultySeeder::class]);
        $this->call([DepartmentSeeder::class]);

        // $this->call([ComplainSeeder::class]);
        $this->call([VendorSeeder::class]);
        $this->call([ComplaincategorySeeder::class]);
        $this->call([ComplaincategorytypeSeeder::class]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
