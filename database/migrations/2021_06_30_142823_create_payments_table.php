<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount')->default(0);
            $table->string('currency');
            $table->bigInteger('balance')->nullable();
            $table->string('reason');
            $table->string('mode');
            $table->foreignId('payment_summaries_id');
            $table->integer('receipt_id')->default(0);
            $table->string('received_by');
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
        Schema::dropIfExists('payments');
    }
}