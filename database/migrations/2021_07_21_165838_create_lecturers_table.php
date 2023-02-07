<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('EmployID')->default('');
            $table->foreignId('user_id');
            $table->string('academic_year')->default('');
            $table->string('nextOfKin1Name')->default('');
            $table->string('nextOfKin1Contact')->default('');
            $table->string('nextOfKin1Email')->default('');
            $table->string('nextOfKin1Address')->default('');
            $table->string('nextOfKin2Name')->default('');
            $table->string('nextOfKin2Contact')->default('');
            $table->string('nextOfKin2Email')->default('');
            $table->string('nextOfKin2Address')->default('');
            $table->string('qualification')->default('');
            $table->string('yearOfStudy')->default('');
            $table->string('institution')->default('');
            $table->string('specialzation')->default('');

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
        Schema::dropIfExists('lecturers');
    }
}
