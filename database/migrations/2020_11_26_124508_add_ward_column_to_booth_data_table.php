<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWardColumnToBoothDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booth_data', function (Blueprint $table) {
            $table->unsignedBigInteger('part_id')->nullable()->after('agent_id');
            $table->unsignedBigInteger('ward_id')->nullable()->after('part_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booth_data', function (Blueprint $table) {
            $table->dropColumn(['part_id', 'ward_id']);
        });
    }
}
