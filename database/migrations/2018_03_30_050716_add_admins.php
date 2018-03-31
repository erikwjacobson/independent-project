<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert(
            ['username' => 'erik', 'password' => bcrypt('xE9L88Pq'), 'admin' => true],
            ['username' => 'sarah', 'password' => bcrypt('L5NnCYwA'), 'admin' => true],
            ['username' => 'megan', 'password' => bcrypt('0nrlssh6'), 'admin' => true],
            ['username' => 'narissa', 'password' => bcrypt('zxrSUa2D'), 'admin' => true],
            ['username' => 'molly', 'password' => bcrypt('P0EghzoX'), 'admin' => true]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->whereIn('username', ['erik', 'sarah', 'megan', 'narissa', 'molly'])->delete();
    }
}
