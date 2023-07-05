<?php

namespace Database\Seeders;

use App\Models\Complaincategory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaincategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Complaincategory::insert([
        ['complain_category_name' => 'computer'],
        ['complain_category_name' => 'software'],
        ['complain_category_name' => 'printer'],
        ['complain_category_name' => 'projector'],
       ]);
    }
}
