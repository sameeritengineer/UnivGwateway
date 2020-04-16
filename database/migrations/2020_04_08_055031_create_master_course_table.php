<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('rank')->default(0);
            $table->float('acceptance_rate', 8, 2)->nullable();
            $table->integer('program_fee')->nullable();
            $table->integer('program_length')->nullable();
            $table->string('scholarship_details')->nullable();
            $table->float('graduation_rate', 8, 2)->nullable();
            $table->integer('average_salary')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('university_id')->references('id')->on('master_university')->onDelete('set null');
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
        Schema::dropIfExists('master_course');
    }
}
