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
        $users = [
            ['username' => 'erik', 'password' => bcrypt('xE9L88Pq'), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'sarah', 'password' => bcrypt('L5NnCYwA'), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'megan', 'password' => bcrypt('0nrlssh6'), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'narissa', 'password' => bcrypt('zxrSUa2D'), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'molly', 'password' => bcrypt('P0EghzoX'), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
        ];

        foreach($users as $user) {
            DB::table('users')->insert($user);
        }
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
