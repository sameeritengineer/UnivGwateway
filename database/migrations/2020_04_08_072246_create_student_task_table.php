<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_task', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->date('due_date')->nullable();
            $table->date('completed_date')->nullable();
            $table->string('status')->nullable();
            $table->text('details')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('task_id')->references('id')->on('master_task')->onDelete('set null');
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
        Schema::dropIfExists('student_task');
    }
}
