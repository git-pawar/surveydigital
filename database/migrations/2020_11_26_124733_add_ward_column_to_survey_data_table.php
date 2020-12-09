<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWardColumnToSurveyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_data', function (Blueprint $table) {
            $table->unsignedBigInteger('part_id')->nullable()->after('surveyor_id');
            $table->unsignedBigInteger('ward_id')->nullable()->after('part_id');
            $table->string('category')->nullable()->after('house_no');
            $table->unsignedBigInteger('retative_to')->nullable()->after('voter_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_data', function (Blueprint $table) {
            $table->dropColumn(['part_id', 'ward_id', 'category','retative_to']);
        });
    }
}
