<?php

use Illuminate\Database\Seeder;

class WomenStageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('women_stage')->delete();
        
        \DB::table('women_stage')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'Idea to pilot (experimentation)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
            1 => 
            array (
                'id' => 2,
            'name' => 'Pilot to proof of concept (customer feedback & viability)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Proof of concept to investment ready (profitability)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
            3 => 
            array (
                'id' => 4,
            'name' => 'Investment ready to revenue generation (sustainability)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
            4 => 
            array (
                'id' => 5,
            'name' => 'Revenue generation to shared value creation (co-creation)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Shared Value creation to Community well-being (well-being)',
                'created_by' => NULL,
                'delete_status' => 0,
            ),
        ));
        
        
    }
}