<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentQueryResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_query_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('query_id')->nullable();
            $table->unsignedBigInteger('responder_id')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('query_id')->references('id')->on('student_query')->onDelete('set null');
            $table->foreign('responder_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('student_query_response');
    }
}
