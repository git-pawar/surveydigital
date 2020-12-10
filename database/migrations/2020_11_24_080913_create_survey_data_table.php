<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parshad_id')->nullable();
            $table->unsignedBigInteger('surveyor_id')->nullable();
            $table->string('ward_no', 200)->nullable();
            $table->string('part_no', 200)->nullable();
            $table->string('s_no', 200)->nullable();
            $table->string('house_no', 200)->nullable();
            $table->string('name', 200)->nullable();
            $table->string('cast', 200)->nullable();
            $table->string('mobile', 200)->nullable();
            $table->bigInteger('voter_count')->default(0)->nullable();
            $table->enum('red_green_blue', ['green', 'blue', 'red'])->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->index(['parshad_id', 'surveyor_id']);
            $table->index(['mobile']);
        });
    }







    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_data');
    }
}
