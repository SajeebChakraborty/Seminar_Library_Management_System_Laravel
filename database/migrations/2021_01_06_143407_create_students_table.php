<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('Student_ID')->unique();
            $table->string('Name');
            $table->string('Session');
            $table->string('Contact_no');
            $table->string('Email')->unique();
            $table->string('Image');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->string('Verify');
            $table->string('Confirmation_Code');
            $table->string('Read');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
