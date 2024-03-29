<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'role_id'=>'1',
        	'name'=>'Admin',
        	'username'=>'krishna',
        	'email'=>'admin@gmail.com',
        	'password'=>bcrypt('rootadmin'),
        ]);
        DB::table('users')->insert([
        	'role_id'=>'2',
        	'name'=>'Student',
        	'username'=>'student01',
        	'email'=>'student@gmail.com',
        	'password'=>bcrypt('rootstudent'),
        ]);
    }
}
