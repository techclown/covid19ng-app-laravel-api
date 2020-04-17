<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreToContributions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contributions', function (Blueprint $table) {
            //

            $table->string('name', 190)->nullable()->default('Anonymous');
            $table->string('status', 190)->nullable()->default(null);
            $table->mediumText('message')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contributions', function (Blueprint $table) {
            //
        });
    }
}
