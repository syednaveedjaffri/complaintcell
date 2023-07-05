<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campus::insert([
            ['campus_name'=>'CitycampusLahore'],
            ['campus_name'=>'RavicampusPattoki'],
    ]);

    }
}
