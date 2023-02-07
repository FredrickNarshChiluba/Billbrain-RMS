<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id');
            $table->foreignId('finance_id');
            $table->string('semester');
            $table->integer('academic_year_id');
            $table->integer('payment_status');
            $table->string('date_of_first_payment');
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
        Schema::dropIfExists('payment_summaries');
    }
}
