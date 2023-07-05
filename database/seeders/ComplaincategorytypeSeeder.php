<?php

namespace Database\Seeders;

use App\Models\Complaincategorytype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplaincategorytypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Complaincategorytype::insert([
            [   'complaincategory_id'=>1,
                'complain_category_type'=>'harddisk'
            ],
            [
                'complaincategory_id'=>1,
                'complain_category_type'=>'ram'
            ],
            [   'complaincategory_id'=>1,
                'complain_category_type'=>'powercable'
            ],
            [
                'complaincategory_id'=>1,
                'complain_category_type'=>'datacable'
            ],
            [   'complaincategory_id'=>2,
                'complain_category_type'=>'windows'
            ],
            [
                'complaincategory_id'=>2,
                'complain_category_type'=>'office'
            ],
            [   'complaincategory_id'=>1,
                'complain_category_type'=>'othersoftware'
            ],
            [
                'complaincategory_id'=>3,
                'complain_category_type'=>'powercable'
            ],
            [   'complaincategory_id'=>3,
                'complain_category_type'=>'datacable'
            ],
            [
                'complaincategory_id'=>3,
                'complain_category_type'=>'papergrapping'
            ],
            [   'complaincategory_id'=>3,
                'complain_category_type'=>'trayproblem'
            ],
            [
                'complaincategory_id'=>3,
                'complain_category_type'=>'power'
            ],
            [
                'complaincategory_id'=>4,
                'complain_category_type'=>'power'
            ],
            [   'complaincategory_id'=>4,
                'complain_category_type'=>'vgacable'
            ],
            [
                'complaincategory_id'=>4,
                'complain_category_type'=>'powercable'
            ],
            [
                'complaincategory_id'=>4,
                'complain_category_type'=>'powercable'
            ],
        ]);
    }
}
