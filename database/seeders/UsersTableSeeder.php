<?php

namespace Database\Seeders;

use Faker\Factory;
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

        $faker=Factory::create();
        // generate 3 users/author
        DB::table('users')->insert([
        [
            'name'=>"John Doe",
            'slug'=>"john-doe",
            'email'=>"johndoe@test.com",
            'password'=>bcrypt('password'),
            'bio'=>$faker->text(rand(250, 300))
        ],

        [
            'name'=>"Jane Doe",
            'slug'=>"jane-doe",
            'email'=>"janedoe@test.com",
            'password'=>bcrypt('password'),
            'bio'=>$faker->text(rand(250, 300))
        ],

        [
            'name'=>"Jarek",
            'slug'=>"jarek",
            'email'=>"jarek@test.com",
            'password'=>bcrypt('secret'),
            'bio'=>$faker->text(rand(250, 300))
        ],

        [
            'name'=>"Jarek Patrny",
            'slug'=>"jarek-patrny",
            'email'=>"jarek.patrny@gmail.com",
            'password'=>bcrypt('password'),
            'bio'=>$faker->text(rand(250, 300))
        ],

        ]);
    }
}
