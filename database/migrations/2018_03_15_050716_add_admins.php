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
            ['username' => 'erik', 'password' => bcrypt(env('ADMIN_ERIK')), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'sarah', 'password' => bcrypt(env('ADMIN_SARAH')), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'megan', 'password' => bcrypt(env('ADMIN_MEGAN')), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'narissa', 'password' => bcrypt(env('ADMIN_NARISSA')), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['username' => 'molly', 'password' => bcrypt(env('ADMIN_MOLLY')), 'admin' => true, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]
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
