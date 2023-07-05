<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::insert([
            [   'campus_id'=>1,
                'faculty_name'=>'Administration/Services'
            ],
            [
                'campus_id'=>1,
                'faculty_name'=>'Biosciences'
            ],
            [   'campus_id'=>1,
                'faculty_name'=>'Livestock Business Management'
            ],
            [   'campus_id'=>1,
                'faculty_name'=>'Veterinary Science'
            ],
            [   'campus_id'=>1,
                'faculty_name'=>'CM RC',
            ],

            [     'campus_id'=>1,
                  'faculty_name'=>'Director Admin and Corrdination'
            ],

            [   'campus_id'=>1,
                'faculty_name'=>'Director Sports'

            ],
            [   'campus_id'=>1,
                'faculty_name'=>'Directorte IT,Lahore'

            ],
            [   'campus_id'=>1,
            'faculty_name'=>'Directorte UDL,Lahore'

            ],
            [   'campus_id'=>2,
                'faculty_name'=>'Animal and Production Technology'
            ],
            [   'campus_id'=>1,
                'faculty_name'=>'Fisheries and WildLife'

            ],
            [   'campus_id'=>2,

                'faculty_name'=>'Vetrinary Sciences'

            ],
            [   'campus_id'=>2,
                'faculty_name'=>'ICE&E'
            ],
            [   'campus_id'=>2,
                'faculty_name'=>'Institution of coordination and Extension'
            ],
            [   'campus_id'=>2,
                'faculty_name'=>'Pet Center'
            ],
            [   'campus_id'=>2,
                'faculty_name'=>'Theriogenology'
            ],
        ]);
    }
}
