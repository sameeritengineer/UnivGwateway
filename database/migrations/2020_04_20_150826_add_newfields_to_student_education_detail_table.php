<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewfieldsToStudentEducationDetailTable extends Migration
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
            $table->string('university_value')->nullable();
            $table->string('institute_value')->nullable();
            $table->string('grade_value')->nullable();
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
