<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoothDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booth_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parshad_id');
            $table->unsignedBigInteger('agent_id');
            $table->string('s_no', 191)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->index(['parshad_id', 'agent_id']);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booth_data');
    }
}
