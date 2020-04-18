<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToStudentEducationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_education_detail', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('course_specialization')->nullable();
            $table->string('course_type')->nullable();
            $table->string('passing_out_year')->nullable();
            $table->string('grading_system')->nullable();
            $table->foreign('university_id')->references('id')->on('master_university')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('master_course')->onDelete('set null');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_education_detail', function (Blueprint $table) {
            //
        });
    }
}
