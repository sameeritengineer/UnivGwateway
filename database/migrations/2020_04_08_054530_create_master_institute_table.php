<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_institute', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->date('year_established')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('university_id')->references('id')->on('master_university')->onDelete('set null');
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
        Schema::dropIfExists('master_institute');
    }
}
