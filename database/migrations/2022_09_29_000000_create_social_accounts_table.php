<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('social_id')->unique();
            $table->bigInteger('owner_id')->nullable();

            $table->string('insta_user_id')->nullable();
            $table->string('insta_username')->nullable();
            $table->string('insta_followers')->nullable();
            $table->string('insta_access_token')->nullable();
            $table->string('insta_last_post_id')->nullable();
            $table->timestamp('insta_last_timestamp')->nullable();
            $table->string('insta_access_token_expires', 100)->nullable();

            $table->string('insta_last_error')->nullable();

            $table->string('tw_user_id')->nullable();
            $table->string('tw_username')->nullable();
            $table->string('tw_name')->nullable();
            $table->string('tw_email')->nullable();
            $table->string('tw_access_token')->nullable();
            $table->string('tw_access_token_secret')->nullable();
            $table->string('tw_refresh_token')->nullable();
            $table->string('tw_token_scope')->nullable();
            $table->timestamp('tw_access_token_expires')->nullable();
            $table->string('tw_photo_url')->nullable();
            $table->string('tw_location')->nullable();
            $table->integer('tw_followers')->nullable();
            $table->string('tw_verified')->nullable();
            $table->string('tw_api_version',30)->nullable();

           // $table->string('tw_email')->nullable();

            $table->string('custom_hashtags')->nullable();
            $table->tinyInteger('auto_post')->default(1);
            $table->tinyInteger('remove_mentions')->nullable()->default(0);
            $table->tinyInteger('remove_caption')->nullable()->default(0);
            $table->tinyInteger('remove_hashtags')->nullable()->default(0);
            $table->tinyInteger('enable_video')->nullable()->default(1);
            $table->tinyInteger('enable_photo')->nullable()->default(1);
            $table->tinyInteger('active')->nullable()->default(0);
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
        Schema::dropIfExists('social_accounts');
    }
}
