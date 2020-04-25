<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToMasterRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_region', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('parent_area_id')->nullable();
            $table->foreign('parent_area_id')->references('id')->on('area_name')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_region', function (Blueprint $table) {
            //
        });
    }
}
