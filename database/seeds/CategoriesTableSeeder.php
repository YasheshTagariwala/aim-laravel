<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Diaspora',
                'groupid' => 1,
                'delete_status' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Social Entrepreneur',
                'groupid' => 1,
                'delete_status' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Youth',
                'groupid' => 1,
                'delete_status' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Women',
                'groupid' => 1,
                'delete_status' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Uncategorized',
                'groupid' => 1,
                'delete_status' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Angel investor',
                'groupid' => 4,
                'delete_status' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Banks/MFI',
                'groupid' => 4,
                'delete_status' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Peer to Peer Lender',
                'groupid' => 4,
                'delete_status' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Personal Investor',
                'groupid' => 4,
                'delete_status' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Venture Capitalist',
                'groupid' => 4,
                'delete_status' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Bank',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Government',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Media',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Mentor',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Non-profit',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Student',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'University',
                'groupid' => 3,
                'delete_status' => 0,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Company',
                'groupid' => 3,
                'delete_status' => 0,
            ),
        ));
        
        
    }
}