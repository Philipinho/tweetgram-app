<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('amount', 10)->nullable();
            $table->string('paddle_checkout_id')->nullable();
            $table->string('paddle_subscription_plan_id')->nullable();
            $table->string('paddle_subscription_id')->nullable();
            $table->string('paddle_update_url')->nullable();
            $table->string('paddle_cancel_url')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->dateTime('next_payment_date')->nullable();
            $table->string('interval')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
