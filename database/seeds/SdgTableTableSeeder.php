<?php

use Illuminate\Database\Seeder;

class SdgTableTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sdg_table')->delete();
        
        \DB::table('sdg_table')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'No Poverty',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Zero Hunger',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Good Health and Well-Being',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Quality Education',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Gender Equality',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Clean Water and Sanitation',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Affordable and Clean energy',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Decent Work and Economic Growth',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Industry,Innovation and Infrastructure',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Reduced Inequalities',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Sustainable Cities and Communities',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Responsible Consumption and Production',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Climate Action',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Life Below Water',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Life On Land',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Peace, Justice and Strong Institutions',
                'codename' => NULL,
                'delete_status' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Partnerships for the Goals',
                'codename' => NULL,
                'delete_status' => 0,
            ),
        ));
        
        
    }
}