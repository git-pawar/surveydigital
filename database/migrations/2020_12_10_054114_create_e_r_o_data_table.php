<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateERODataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_r_o_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nn_id')->nullable();
            $table->unsignedBigInteger('nnn_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->unsignedBigInteger('part_id')->nullable();
            $table->bigInteger('section_no')->nullable();
            $table->bigInteger('s_no')->nullable();
            $table->string('house_no', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('surname', 100)->nullable();
            $table->string('relation', 100)->nullable();
            $table->string('father_name', 100)->nullable();
            $table->string('cast', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->integer('age')->nullable();
            $table->string('path', 191)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('e_r_o_data');
    }
}
