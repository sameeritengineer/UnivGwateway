<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('content_id')->nullable();
            $table->date('first_view_date')->nullable();
            $table->date('last_view_date')->nullable();
            $table->integer('view_count')->nullable();
            $table->integer('download_count')->nullable();
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null');
            $table->foreign('content_id')->references('id')->on('master_content')->onDelete('set null');
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
        Schema::dropIfExists('student_content');
    }
}
