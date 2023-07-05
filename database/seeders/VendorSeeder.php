<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::insert
        ([
            [   'company_name' => 'Global Corporation',
                'vendor_name'=>'Amir Ahmed',
                'email' => 'global@gmail.com',
                'phone' => '03245674321',
                'address' => 'Gulberg',
                'city' => 'Lahore',
                'state' => 'Punjab',
            ],
            [   'company_name' => 'BA Corporation',
                'vendor_name'=>'Sohail',
                'email' => 'ba@gmail.com',
                'phone' => '03245674321',
                'address' => 'Milton Road',
                'city' => 'Karachi',
                'state' => 'Sindh',
            ],

      ]);
    }
}
