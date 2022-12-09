<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        $php = new Tag;
        $php->name = "PHP";
        $php->slug = "php";
        $php->save();

        $laravel = new Tag;
        $laravel->name = "Laravel";
        $laravel->slug = "laravel";
        $laravel->save();

        $symfony = new Tag;
        $symfony->name = "Symfony";
        $symfony->slug = "symfony";
        $symfony->save();

        $vue = new Tag;
        $vue->name = "Vue JS";
        $vue->slug = "vuejs";
        $vue->save();

        $tags =
          [
            $php->id,
            $laravel->id,
            $symfony->id,
            $vue->id
          ];

        foreach(Post::all() as $post)
        {
            shuffle($tags);
            for ($i=0; $i<rand(0, count($tags)-1); $i++)
            {
                $post->tags()->detach($tags[$i]);
                $post->tags()->attach($tags[$i]);
            }
        }

    }


}
