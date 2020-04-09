<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('current_education_status')->nullable();
            $table->string('current_specialization')->nullable();
            $table->date('planned_admit_date')->nullable();
            $table->integer('planned_degree_program_id')->nullable();
            $table->string('planned_specialization')->nullable();
            $table->integer('package_id')->nullable();
            $table->string('image')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->integer('annual_family_income')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('student');
    }
}
