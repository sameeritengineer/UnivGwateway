<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFielsToMasterTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_test', function (Blueprint $table) {
            //
            $table->string('min_score')->nullable();
            $table->date('test_start_date')->nullable();
            $table->date('test_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_test', function (Blueprint $table) {
            //
        });
    }
}
