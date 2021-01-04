<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBoothDataToSurveyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_data', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_id')->after('surveyor_id')->nullable();
            $table->boolean('attend_booth')->after('red_green_blue')->default(0)->nullable();
            $table->index('agent_id');
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
            $table->dropColumn(['agent_id', 'attend_booth']);
        });
    }
}
