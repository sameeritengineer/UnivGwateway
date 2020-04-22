<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMasterInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_institute', function (Blueprint $table) {
            //
            $table->string('institute_type')->nullable();
            $table->string('institute_rank')->nullable();
            $table->string('acceptance_rate')->nullable();
            $table->string('annual_international_student_tuition_fees')->nullable();
            $table->string('annual_room_boarding_fees')->nullable();
            $table->string('annual_instate_student_tuition_fees')->nullable();
            $table->string('percentage_of_students_getting_scholarship')->nullable();
            $table->string('avg_scholarship_amount_offered')->nullable();
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_institute', function (Blueprint $table) {
            //
        });
    }
}
