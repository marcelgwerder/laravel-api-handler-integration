<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->dateTime('published_from')->nullable();
            $table->dateTime('published_until')->nullable();
            $table->string('slug')->unique();
            $table->string('title', 200);
            $table->string('teaser', 255);
            $table->string('teaser_image', 255);
            $table->text('content');
            $table->unsignedInteger('user_id');
        });

        DB::statement('ALTER TABLE posts ADD FULLTEXT fulltext_index (title, content)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
