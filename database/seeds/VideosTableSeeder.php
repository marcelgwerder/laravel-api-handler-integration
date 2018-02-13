<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->delete();

        $faker = Faker\Factory::create();

        factory(App\Video::class, 40)->create()->each(function ($post) use ($faker) {
            $tagCount = rand(2, 10);
            $tags = App\Tag::orderByRaw('RAND()')->limit($tagCount)->get()->keyBy('id')->all();

            for ($i = 0; $i < $tagCount; $i++) {
                $tagId = array_rand($tags);
                $tag = $tags[$tagId];
                unset($tags[$tagId]);

                if ($faker->boolean(10) || !$tag) {
                    $tag = factory(App\Tag::class)->create();
                }

                $post->tags()->attach($tag->id);
                $post->tagsPoly()->attach($tag->id);
            }

            $commentCount = rand(0, 10);
            for ($i = 0; $i < $commentCount; $i++) {
                $post->comments()->save(factory(App\Comment::class)->make());
            }
        });
    }
}
