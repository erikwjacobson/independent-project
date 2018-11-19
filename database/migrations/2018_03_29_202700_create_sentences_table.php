<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('style_id')->unsigned();
            $table->integer('emotion_id')->unsigned();
            $table->string('text');
            $table->float('value');
            $table->timestamps();

            $table->foreign('style_id')
                ->references('id')
                ->on('styles');
            $table->foreign('emotion_id')
                ->references('id')
                ->on('emotions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentences');
    }
}
