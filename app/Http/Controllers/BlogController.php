<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    protected $limit = 3;
    public function index()
    {

//        \DB::enableQueryLog();
        $posts=Post::with('author', 'tags', 'category')
                   ->latestFirst()
                   ->published()
                   ->filter(request()->only(['term', 'year', 'month']))
                   ->simplePaginate($this->limit);

        return view("blog.index", compact('posts'));
//        dd(\DB::getQueryLog());

    }

    public function category(Category $category)
    {
        $categoryName = $category->title;

//       \DB::enableQueryLog();
//        $posts=Post::with('author')
//            ->latestFirst()
//            ->published()
//            ->where('category_id', $id)
//            ->simplePaginate($this->limit);

        $posts=$category->posts()
                        ->with('author', 'tags')
                        ->latestFirst()
                        ->published()
                        ->simplePaginate($this->limit);
        return view("blog.index", compact('posts', 'categoryName'));

//       dd(\DB::getQueryLog());

    }

    public function tag(Tag $tag)
    {
        $tagName = $tag->title;

        $posts=$tag->posts()
            ->with('author', 'category')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);
        return view("blog.index", compact('posts', 'tagName'));

    }


    public function author(User $author)
    {
        $authorName = $author->name;
        $posts=$author->posts()
            ->with('category', 'tags')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);
        return view("blog.index", compact('posts', 'authorName'));
    }


    public function show(Post $post)
    {
        //update posts set view_count = view_count + 1 where id=?
        # 1
//        $viewCount=$post->view_count + 1;
//        $post->update(['view_count' => $viewCount]);

        # 2
          $post->increment('view_count');

        return view("blog.show", compact('post'));
    }

}

