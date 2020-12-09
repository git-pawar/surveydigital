<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('state')->nullable()->after('email');
            $table->unsignedBigInteger('city')->nullable()->after('state');
            $table->unsignedBigInteger('nnn_id')->nullable()->after('city');
            $table->unsignedBigInteger('nn_id')->nullable()->after('nnn_id');
            $table->unsignedBigInteger('ward_id')->nullable()->after('nn_id');
        });
    }







    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'state',
                'city',
                'nnn_id',
                'nn_id',
                'ward_id'
            ]);
        });
    }
}
