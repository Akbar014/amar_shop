<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challans', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->nullable();
            $table->string('c_number')->nullable();
            $table->longText('c_address')->nullable();
            $table->longText('delivery_address')->nullable();
            $table->longText('narration')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('invoice')->nullable();
            $table->string('serial')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('driver')->nullable();
            $table->string('request')->nullable();
            $table->string('vehicle')->nullable();
            $table->longText('ho')->nullable();
            $table->longText('invoice_no')->nullable();
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
        Schema::dropIfExists('challans');
    }
}
