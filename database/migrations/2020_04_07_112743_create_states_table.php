<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable()->default(null);
            $table->string('capital', 150)->nullable()->default(null);
            $table->string('population', 150)->nullable()->default(null);
            $table->string('longitude', 150)->nullable()->default(null);
            $table->string('latitude', 150)->nullable()->default(null);
            $table->string('admission', 150)->nullable()->default(null);
            $table->string('cases', 150)->nullable()->default(null);
            $table->string('recovered', 150)->nullable()->default(null);
            $table->string('death', 150)->nullable()->default(null);
            $table->string('first_occur', 150)->nullable()->default(null);
            $table->string('contact_name', 150)->nullable()->default(null);
            $table->string('contact_phone', 150)->nullable()->default(null);
            $table->string('contact_email', 150)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
