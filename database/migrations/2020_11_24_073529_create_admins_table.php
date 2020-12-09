<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['admin', 'parshad'])->default('parshad')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile', 191)->nullable();
            $table->string('email', 191)->nullable();
            $table->string('password', 191)->nullable();
            $table->unsignedBigInteger('state')->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->unsignedBigInteger('nnn_id')->nullable();
            $table->unsignedBigInteger('nn_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->rememberToken();
            $table->timestamp('deleted_at')->nullable();
            $table->boolean('is_active')->default(1)->nullable();
            $table->timestamps();
            $table->index(['mobile', 'email']);
            $table->index(['nnn_id', 'city']);
            $table->index(['nn_id', 'ward_id']);
        });
    }












    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
