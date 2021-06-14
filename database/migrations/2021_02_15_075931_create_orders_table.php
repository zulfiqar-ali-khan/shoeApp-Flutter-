<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('brand_id');
            $table->foreignId('store_id');
            $table->foreignId('shoe_id');
            $table->foreignId('customer_id');
            $table->integer('quantity');
            $table->date('date')->nullable();
            $table->integer('total_amount');
            $table->integer('inv_id')->default(0);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('shoe_id')->references('id')->on('shoe_details');
            $table->foreign('customer_id')->references('id')->on('customers');
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
}
