<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'watches',
                'short_desc' => 'highly upgrated watch, version 5.6',
                'description' => 'highly upgrated watch, version 5.6 , we improved all the features by ancient technologies.',
                'product_data' => 15.0,
                'sale_price' => 10.0,
                'start_date' => NULL,
                'end_date' => NULL,
                'categories' => 'Youth,Uncategorized',
                'tags' => 'offer sale',
                'imagepath' => 'http://127.0.0.1:8000/files/documents/20190206064130_123_watches.jpg',
                'userid' => 2,
                'created_by' => 2,
                'updated_by' => 2,
                'created_at' => '2019-02-06 12:11:30',
                'updated_at' => '2019-02-06 12:11:30',
                'delete_status' => 0,
            ),
        ));
        
        
    }
}