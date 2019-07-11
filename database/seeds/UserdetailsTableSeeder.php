<?php

use Illuminate\Database\Seeder;

class UserdetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('userdetails')->delete();
        
        \DB::table('userdetails')->insert(array (
            0 => 
            array (
                'id' => 1,
                'firstname' => 'support',
                'lastname' => 'test',
                'email' => 'supporter@gmail.com',
                'username' => 'supporter',
                'password' => 'e3b81d385ca4c26109dfbda28c563e2b',
                'phone' => NULL,
                'groupid' => 3,
                'is_hide' => 0,
                'userid' => NULL,
                'provider' => NULL,
                'approve_status' => 1,
                'created_at' => '2018-10-23 16:13:11',
                'updated_at' => '2018-10-29 12:58:38',
                'delete_status' => 0,
                'created_by' => NULL,
                'updated_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'firstname' => 'entrepreneur',
                'lastname' => 'test',
                'email' => 'entrepreneur@gmail.com',
                'username' => 'entrepreneur',
                'password' => 'e3b81d385ca4c26109dfbda28c563e2b',
                'phone' => '1234570000',
                'groupid' => 1,
                'is_hide' => 0,
                'userid' => NULL,
                'provider' => NULL,
                'approve_status' => 1,
                'created_at' => '2018-10-23 16:15:04',
                'updated_at' => '2018-11-22 11:23:42',
                'delete_status' => 0,
                'created_by' => NULL,
                'updated_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'firstname' => 'Organization',
                'lastname' => 'test',
                'email' => 'organization@gmail.com',
                'username' => 'organization',
                'password' => 'e3b81d385ca4c26109dfbda28c563e2b',
                'phone' => NULL,
                'groupid' => 2,
                'is_hide' => 0,
                'userid' => NULL,
                'provider' => NULL,
                'approve_status' => 1,
                'created_at' => '2018-10-23 16:53:59',
                'updated_at' => '2018-10-23 16:55:39',
                'delete_status' => 0,
                'created_by' => NULL,
                'updated_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'firstname' => 'Investor',
                'lastname' => 'test',
                'email' => 'investor@gmail.com',
                'username' => 'investor',
                'password' => 'e3b81d385ca4c26109dfbda28c563e2b',
                'phone' => NULL,
                'groupid' => 4,
                'is_hide' => 0,
                'userid' => NULL,
                'provider' => NULL,
                'approve_status' => 1,
                'created_at' => '2018-10-23 16:56:53',
                'updated_at' => '2018-10-23 16:56:53',
                'delete_status' => 0,
                'created_by' => NULL,
                'updated_by' => NULL,
            ),
            4 => 
            array (
                'id' => 10,
                'firstname' => 'Crizpal',
                'lastname' => 'Aim',
                'email' => 'aim.crizpal@gmail.com',
                'username' => 'Crizpal Aim',
                'password' => '26cae7718c32180a7a0f8e19d6d40a59',
                'phone' => NULL,
                'groupid' => 3,
                'is_hide' => 0,
                'userid' => NULL,
                'provider' => 'facebook',
                'approve_status' => 1,
                'created_at' => '2019-01-11 14:01:08',
                'updated_at' => '2019-01-11 14:01:08',
                'delete_status' => 0,
                'created_by' => NULL,
                'updated_by' => NULL,
            ),
        ));
        
        
    }
}