<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('futsal_id');
            $table->foreign('futsal_id')->references('id')->on('futsals')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
            $table->index('futsal_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grounds');
    }
}
