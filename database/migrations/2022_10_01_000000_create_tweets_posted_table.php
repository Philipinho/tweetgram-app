<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsPostedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets_posted', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();
            $table->string('social_id')->nullable();
            $table->string('media_type')->nullable();
            $table->string('sub_media_type')->nullable();
            $table->string('twitter_user_id')->nullable();
            $table->string('twitter_username')->nullable();
            $table->string('tweet_id')->nullable();

            $table->string('insta_user_id')->nullable();
            $table->string('insta_username')->nullable();
            $table->string('insta_post_id')->nullable();
            $table->string('insta_post_url')->nullable();
            $table->text('insta_thumbnail_url')->nullable();
            $table->dateTime('insta_post_time')->nullable();

            $table->string('recorded_error')->nullable();

            $table->tinyInteger('status')->nullable()->default(1);
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets_posted');
    }
}
