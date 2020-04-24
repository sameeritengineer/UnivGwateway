<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToStudentTestScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_test_score', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('attend_year')->nullable();
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_test_score', function (Blueprint $table) {
            //
        });
    }
}
