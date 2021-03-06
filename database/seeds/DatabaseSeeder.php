<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SdgTableTableSeeder::class);
        $this->call(UserdetailsTableSeeder::class);
        $this->call(UsergroupTableSeeder::class);
        $this->call(WomenStageTableSeeder::class);
    }
}
