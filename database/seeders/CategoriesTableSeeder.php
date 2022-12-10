<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('categories') -> truncate();


        DB ::table('categories') -> insert([

            [
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],


            [
                'title' => 'Tips and Tricks',
                'slug' => 'tips-and-tricks'
            ],

            [
                'title' => 'Build Apps',
                'slug' => 'build-apps'
            ],

            [
                'title' => 'News',
                'slug' => 'news'
            ],

            [
                'title' => 'Freebies',
                'slug' => 'freebies'
            ],

        ]);

        // update the posts data
        foreach (Post::pluck('id') as $postId)      /*for ($post_id = 1; $post_id <= 10; $post_id++)*/
        {
            $categories = Category::pluck('id');
            $categoryId = $categories [rand(0, $categories->count()-1)];

            DB::table('posts')
                ->where('id', $postId)
                ->update(['category_id' => $categoryId]);
        }
    }
}
