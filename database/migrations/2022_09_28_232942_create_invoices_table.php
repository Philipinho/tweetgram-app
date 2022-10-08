<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('paddle_order_id')->nullable();
            $table->string('paddle_subscription_payment_id')->nullable();
            $table->string('paddle_checkout_id')->nullable();
            $table->string('paddle_receipt_url')->nullable();
            $table->string('paddle_subscription_plan_id')->nullable();
            $table->string('paddle_subscription_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('paddle_payment_method')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->string('card_expiration_date')->nullable();
            $table->dateTime('paddle_event_time')->nullable();
            $table->string('payment_provider')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
