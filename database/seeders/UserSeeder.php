<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [   'name'=>'admin',
                'designation' => 'IT',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('12345678'),
                'is_admin' => true,
                'ip_address' => ''],
            [   'name'=>'test',
                'designation' => 'Office Admin',
                'email'=>'test@gmail.com',
                'password'=>bcrypt('12345678'),
                'is_admin' => false,
                'ip_address' => ''],
        ]);
    }
}
