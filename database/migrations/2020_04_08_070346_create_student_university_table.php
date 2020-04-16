<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentUniversityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_university', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->date('date_applied')->nullable();
            $table->string('application_status')->nullable();
            $table->dateTime('application_deadline', 0)->nullable();
            $table->string('classification')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null');
            $table->foreign('university_id')->references('id')->on('master_university')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('master_course')->onDelete('set null');
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
        Schema::dropIfExists('student_university');
    }
}
