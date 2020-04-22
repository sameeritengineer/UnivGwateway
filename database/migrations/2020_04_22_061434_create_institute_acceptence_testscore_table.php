<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteAcceptenceTestscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_acceptence_testscore', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->string('course_specific_institute_rank')->nullable();
            $table->string('salary_post_completion')->nullable();
            $table->boolean('active')->default(1);
            $table->foreign('institute_id')->references('id')->on('master_institute')->onDelete('set null');
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
        Schema::dropIfExists('institute_acceptence_testscore');
    }
}
