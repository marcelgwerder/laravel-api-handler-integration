<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_extended')->delete();
        DB::table('posts')->delete();
        DB::table('votes')->delete();

        $faker = Faker\Factory::create();

        factory(App\Post::class, 40)->create()->each(function ($post) use ($faker) {
            $voteCount = rand(0, 30);
            for ($i = 0; $i < $voteCount; $i++) {
                $post->votes()->save(factory(App\Vote::class)->make());
            }

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

            $post->extended()->save(factory(App\PostExtended::class)->make());

            $commentCount = rand(0, 10);
            for ($i = 0; $i < $commentCount; $i++) {
                $post->comments()->save(factory(App\Comment::class)->make());
            }
        });
    }
}
