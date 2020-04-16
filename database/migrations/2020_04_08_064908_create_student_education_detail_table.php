<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentEducationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_education_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->string('highest_grade_studied')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->string('degree_specialization')->nullable();
            $table->date('program_start_date')->nullable();
            $table->date('program_end_date')->nullable();
            $table->integer('program_score')->nullable();
            $table->integer('program_max_score')->nullable();
            $table->string('program_score_format')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null');
            $table->foreign('institute_id')->references('id')->on('master_institute')->onDelete('set null');
            $table->foreign('degree_id')->references('id')->on('master_degree')->onDelete('set null');
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
        Schema::dropIfExists('student_education_detail');
    }
}
