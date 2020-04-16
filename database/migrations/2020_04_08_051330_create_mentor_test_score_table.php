<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorTestScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_test_score', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->unsignedBigInteger('test_id')->nullable();
            $table->date('test_year')->nullable();
            $table->integer('score')->nullable();
            $table->integer('max_score')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('set null');
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
        Schema::dropIfExists('mentor_test_score');
    }
}
