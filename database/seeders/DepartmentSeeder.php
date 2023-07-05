<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::insert([
            [
                'faculty_id'=>1,
                'department_name'=>'Avian research Center',

            ],
            [   'faculty_id'=>1,
                'department_name'=>'Building and Works',

            ],
            [
                'faculty_id'=>1,
                'department_name'=>'Controller of Examination',

            ],
            [   'faculty_id'=>1,
                'department_name'=>'Directorate of ICE&E',

            ],
            [
                'faculty_id'=>1,
                'department_name'=>'Directorate of Plaining and Developement',

            ],
            [   'faculty_id'=>1,

                'department_name'=>'Directorate of QEC',

            ],
            [   'faculty_id'=>2,
                'department_name'=>'Biological sciences',

            ],
            [
                'faculty_id'=>2,
                'department_name'=>'Environmental Sciences',
            ],
            [
                'faculty_id'=>1,
                'department_name'=>'CMS Ravi Campus',
            ],
            [
                'faculty_id'=>2,
                'department_name'=>'Agri.Farm.Horiculture',
            ],
            [
                'faculty_id'=>3,
                'department_name'=>'test Livestock',

            ],
            [
                'faculty_id'=>1,
                'department_name'=>'test vetrinary sciences',

            ],
            [
                'faculty_id'=>5,
                'department_name'=>'test CMRC',
            ],
            [

                'faculty_id'=>10,
                'department_name'=>'test Animal Production',
            ],
                ['faculty_id'=>12,
                'department_name'=>'Pattoki Vetrinary sciences',
            ]
        ]);
    }
}
