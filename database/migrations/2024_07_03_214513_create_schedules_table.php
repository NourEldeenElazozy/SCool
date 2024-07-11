<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('classcourses_id')->unsigned();
            $table->foreign('classcourses_id')->references('id')->on('class_courses')->onDelete('cascade');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('attendance')->nullable();
            $table->integer('absence')->nullable();
            $table->integer('course_duration');
            $table->boolean('student_enrollment')->default(false);
            $table->boolean('student_Present')->default(false);
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
        Schema::dropIfExists('schedules');
    }
}
