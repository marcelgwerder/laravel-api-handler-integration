<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::table('taggables')->delete();
        DB::table('votes')->delete();
        DB::table('countries')->delete();
        DB::table('users')->delete();
        DB::table('posts')->delete();
        DB::table('post_extended')->delete();
        DB::table('post_tag')->delete();
        DB::table('videos')->delete();
        DB::table('comments')->delete();

        $this->call([
            CountriesTableSeeder::class,
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            VideosTableSeeder::class,
        ]);
    }
}
