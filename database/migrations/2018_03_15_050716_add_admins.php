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
            ['id' => 1, 'username' => 'erik', 'password' => bcrypt(env('ADMIN_ERIK')), 'admin' => true, 'practice_questions_completed' => 0, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => 2, 'username' => 'samantha', 'password' => bcrypt(env('ADMIN_SAMANTHA')), 'admin' => true, 'practice_questions_completed' => 0, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => 3, 'username' => 'monica', 'password' => bcrypt(env('ADMIN_MONICA')), 'admin' => true, 'practice_questions_completed' => 0, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => 4, 'username' => 'moses', 'password' => bcrypt(env('ADMIN_MOSES')), 'admin' => true, 'practice_questions_completed' => 0, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
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
        DB::table('users')->where('admin', true)->delete();
    }
}
