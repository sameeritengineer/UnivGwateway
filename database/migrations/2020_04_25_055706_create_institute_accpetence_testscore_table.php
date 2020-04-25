<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteAccpetenceTestscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accpetence_testscore', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('institute_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->string('min_score_or_avg_score')->nullable();
            $table->string('75_percentile_score')->nullable();
            $table->foreign('institute_id')->references('id')->on('master_institute')->onDelete('set null');
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
        Schema::dropIfExists('accpetence_testscore');
    }
}
