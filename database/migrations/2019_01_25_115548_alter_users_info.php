<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('computer')->nullable();
            $table->string('researcher_initials')->nullable();
            $table->boolean('overtime')->nullable();
            $table->boolean('credit_granted')->nullable();
            $table->text('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn(['computer', 'researcher_initials', 'overtime', 'credit_granted', 'comments']);
        });
    }
}
