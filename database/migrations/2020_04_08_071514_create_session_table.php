<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->timestamp('time')->nullable();
            $table->string('status')->nullable();
            $table->string('agenda')->nullable();
            $table->string('outcome')->nullable();
            $table->float('student_rating', 8, 2)->nullable();
            $table->string('student_feedback')->nullable();
            $table->float('mentor_rating', 8, 2)->nullable();
            $table->string('mentor_feedback')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('student_id')->references('id')->on('student')->onDelete('set null');
            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('set null');
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
        Schema::dropIfExists('session');
    }
}
