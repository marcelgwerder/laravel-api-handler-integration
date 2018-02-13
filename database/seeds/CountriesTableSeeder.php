<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['code' => 'us', 'name' => 'United States'],
            ['code' => 'ch', 'name' => 'Switzerland'],
            ['code' => 'de', 'name' => 'Germany'],
            ['code' => 'fr', 'name' => 'France'],
        ]);
    }
}
