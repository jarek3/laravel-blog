<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        // Create Admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        // Create Editor role
        $editor = new Role();
        $editor->name = "editor";
        $editor->display_name = "Editor";
        $editor->save();

        // Create Author role
        $author = new Role();
        $author->name = "author";
        $author->display_name = "Author";
        $author->save();

        // Attach the roles
        // first user as admin
        $user4 = User::find(4);
        $user4->detachRole($admin);
        $user4->attachRole($admin);

        // second user as editor
        $user3 = User::find(3);
        $user3->detachRole($editor);
        $user3->attachRole($editor);

        // third user as editor
        $user1 = User::find(1);
        $user1->detachRole($editor);
        $user1->attachRole($editor);

        // fourth user as author
        $user2 = User::find(2);
        $user2->detachRole($author);
        $user2->attachRole($author);

    }
}
