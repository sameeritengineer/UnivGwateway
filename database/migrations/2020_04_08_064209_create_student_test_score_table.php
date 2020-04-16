<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTestScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_test_score', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->date('taken_test_date')->nullable();
            $table->date('planned_test_date')->nullable();
            $table->integer('total_score')->nullable();
            $table->integer('quant_score')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('test_id')->references('id')->on('master_test')->onDelete('set null');
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
        Schema::dropIfExists('student_test_score');
    }
}
