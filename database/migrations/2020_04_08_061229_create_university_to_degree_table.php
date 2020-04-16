<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityToDegreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_to_degree', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->foreign('university_id')->references('id')->on('master_university')->onDelete('set null');
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
        Schema::dropIfExists('university_to_degree');
    }
}
