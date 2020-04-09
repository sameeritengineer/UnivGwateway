<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorUniversityAppliedListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_university_applied_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id')->nullable(); 
            $table->unsignedBigInteger('university_id')->nullable(); 
            $table->unsignedBigInteger('course_id')->nullable();
            $table->date('year_applied')->nullable();
            $table->boolean('application_status')->default(0);
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
        Schema::dropIfExists('mentor_university_applied_list');
    }
}
