<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('product_id');
            $table->string('payment_method')->nullable();
            $table->string('phone')->nullable();
            $table->string('bidding_price')->nullable();
            $table->string('paid_amount')->nullable();
            $table->enum('payment_status', ['0', '1', '2','3'])->default('0');
            $table->text("shipping_address")->nullable();
            $table->text("billing_address")->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_fee')->nullable();
            $table->string('invoice_total')->nullable();
            $table->string('order_total')->nullable();
            $table->text('comment')->nullable();
            $table->enum('order_status', ['0', '1',])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
