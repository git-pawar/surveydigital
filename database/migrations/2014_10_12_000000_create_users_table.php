<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['surveyor', 'agent', 'parshad']);
            $table->bigInteger('parshad_id')->default(0);
            $table->string('name', 191)->nullable();
            $table->string('mobile', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->string('part_no', 191)->nullable();
            $table->string('section', 191)->nullable();
            $table->bigInteger('s_no_from')->nullable();
            $table->bigInteger('s_no_to')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->index(['parshad_id', 'mobile']);
        });
    }









    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
