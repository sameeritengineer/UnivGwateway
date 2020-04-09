<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->integer('mobile')->nullable();
            $table->integer('university_attended_id')->nullable();
            $table->date('year_of_graduation')->nullable();
            $table->string('degree_program_id')->nullable();
            $table->string('major_specialization')->nullable();
            $table->boolean('is_employed')->default(0);
            $table->string('employer_name')->nullable();
            $table->string('job_title')->nullable();
            $table->integer('country_code')->nullable();
            $table->text('detailed_bio')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('picture_url')->nullable();
            $table->string('image')->nullable();
            $table->string('featured')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('mentors');
    }
}
