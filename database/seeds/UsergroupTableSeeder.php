<?php

use Illuminate\Database\Seeder;

class UsergroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usergroup')->delete();
        
        \DB::table('usergroup')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Entrepreneur',
                'url' => 'entrepreneur',
                'reg_url' => 'entrepreneur',
                'view_status' => 0,
                'delete_status' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Organization',
                'url' => 'organization',
                'reg_url' => 'organization',
                'view_status' => 0,
                'delete_status' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Supporter',
                'url' => 'supporter',
                'reg_url' => 'supporter',
                'view_status' => 0,
                'delete_status' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Investor',
                'url' => 'investor',
                'reg_url' => 'investor',
                'view_status' => 0,
                'delete_status' => 0,
            ),
        ));
        
        
    }
}