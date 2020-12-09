<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_nos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->bigInteger('part_no')->nullable();
            $table->string('part_name')->nullable();
            $table->bigInteger('total_voter')->nullable();
            $table->timestamps();
            $table->index(['ward_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('part_nos');
    }
}
