<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnToSurveyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_data', function (Blueprint $table) {
            $table->unsignedBigInteger('nn_id')->nullable()->after('surveyor_id');
            $table->unsignedBigInteger('nnn_id')->nullable()->after('nn_id');
            $table->unsignedBigInteger('city_id')->nullable()->after('nnn_id');
            $table->unsignedBigInteger('ward_id')->nullable()->after('city_id');
            $table->bigInteger('section')->nullable()->after('part_id');
            $table->string('surname', 100)->nullable()->after('mobile');
            $table->string('relation', 100)->nullable()->after('surname');
            $table->string('father_name', 100)->nullable()->after('relation');
            $table->string('gender', 100)->nullable()->after('father_name');
            $table->integer('age')->nullable()->after('gender');
            $table->string('path', 191)->nullable()->after('age');
            $table->index(['path', 'part_id']);
            $table->index(['ward_id', 's_no']);
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
            $table->dropColumn(['nn_id', 'nnn_id', 'city_id', 'ward_id', 'part_id', 'section', 'surname', 'relation', 'father_name', 'gender', 'age', 'path']);
        });
    }
}
