<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'ID' => 1,
                'user_login' => 'admin aim',
                'user_pass' => 'e3b81d385ca4c26109dfbda28c563e2b',
                'user_nicename' => 'Africa Innovation Market',
                'user_email' => 'aim@gmail.com',
                'user_url' => 'admin',
                'user_status' => 0,
                'display_name' => 'AIM',
            ),
        ));
        
        
    }
}