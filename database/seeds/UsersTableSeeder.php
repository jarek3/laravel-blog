<?php

namespace Database\Seeds;

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
        // reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        // generate 3 users/author
        DB::table('users')->insert([
        [
            'name'=>"John",
            'email'=>"johndoe@test.com",
            'password'=>bcrypt('secret')
        ],

        [
            'name'=>"Jane",
            'email'=>"janedoe@test.com",
            'password'=>bcrypt('secret')
        ],

        [
            'name'=>"Jarek",
            'email'=>"jarek@test.com",
            'password'=>bcrypt('secret')
        ],
        ]);
    }
}
