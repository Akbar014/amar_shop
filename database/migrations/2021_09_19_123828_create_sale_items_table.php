<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sale_id')->unsigned();
            $table->string('product_name');
            $table->string('product_model')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_capacity')->nullable();
            $table->string('product_serial')->nullable();
            $table->integer('sale_item_quantity');
            $table->string('unit');
            $table->double('sale_item_price');
            $table->double('sale_item_total_amount');
            $table->timestamps();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_items');
    }
}
