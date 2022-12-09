<?php
namespace App\Views\Composers;

use App\Models\Tag;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;
class NavigationComposer
{
    public function compose(View $view)
    {
        $this->composeCategories($view);

        $this->composeTags($view);

        $this->composePopularPosts($view);
    }

    private function composeCategories(View $view)
    {
        $categories=Category::with(['posts'=>function($query){
            $query->published();
        }])->orderBy('title', 'asc')->get();

        $view->with('categories', $categories);
    }

    public function composeTags(View $view)
    {
        $tags=Tag::has('posts')->get();
        $view->with('tags', $tags);
    }

    private function composePopularPosts(View $view)
    {
        $popularPosts=Post::published()->popular()->take(3)->get();
        $view->with('popularPosts',$popularPosts);
    }

}
