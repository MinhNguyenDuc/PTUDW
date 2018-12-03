<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('studentID')->unique();
            $table->string('name')->nullable();
            $table->integer('gender')->nullable();
            $table->date('birth')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('academic_yearID')->nullable();
            $table->foreign('province')->references('id')->on('provinces');
            $table->foreign('district')->references('id')->on('districts');
            $table->foreign('academic_yearID')->references('id')->on('academic_years');
            $table->primary('studentID');
            $table->timestamps();
            $table->integer('status')->default(1);
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
