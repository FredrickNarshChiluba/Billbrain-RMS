<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('nationality');
            $table->string('district');
            $table->string('Town')->nullable();
            $table->string('postal');
            $table->string('phone_1')->default('');
            $table->string('phone_2')->default('')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth')->nullable();
            $table->string('profileImage')->default('default.jpg');
            $table->string('religion')->default('');
            $table->string('marital_status')->default('');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_contact')->nullable();
            $table->enum('disability', ['Yes', 'No']);
            $table->string('nature_of_disability')->nullable();
            $table->string('role')->default('Super User');
            $table->string('father_name')->default('')->nullable();
            $table->string('father_contact')->default('')->nullable();
            $table->string('mother_name')->default('')->nullable();
            $table->string('mother_contact')->default('')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
