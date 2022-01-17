<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vessel_id');
            $table->foreign('vessel_id')->references('id')->on('vessels');
            $table->string('code');
            $table->dateTime('start', $precision = 0);
            $table->dateTime('end', $precision = 0);
            $table->string('status')->default('pending');
            // $table->string('status')->default('pending');
            $table->decimal('revenues', $precision = 8, $scale = 2);
            $table->decimal('expenses', $precision = 8, $scale = 2);
            $table->decimal('profit', $precision = 8, $scale = 2);
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
        Schema::dropIfExists('voyages');
    }
}
