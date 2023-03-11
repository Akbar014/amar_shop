<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallanItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challan_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('challan_id')->unsigned();
            $table->string('product_name');
            $table->string('product_model')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_serial')->nullable();
            $table->integer('challan_item_quantity');
            $table->string('unit');
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->foreign('challan_id')->references('id')->on('challans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challan_items');
    }
}
