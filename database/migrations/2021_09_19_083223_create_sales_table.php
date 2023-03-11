<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('product_id')->unsigned();
            $table->string('c_name');
            $table->string('c_email')->nullable();
            $table->string('c_number');
            $table->longText('c_address');
            $table->string('cp_name');
            $table->string('cp_number');
            $table->string('cp_address');
            $table->text('narration');
            $table->string('relational_manager');
            $table->string('guarantee_card_no');
            $table->string('po_ref_no');
            $table->string('invoice');
            $table->double('total_amount');
            $table->double('discount')->nullable();
            $table->double('discounted_price')->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('due_amount')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
