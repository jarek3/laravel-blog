<?php

    use App\Http\Controllers\Backend\ContactController;
    use App\Http\Controllers\BlogController;
    use App\Http\Controllers\CommentsController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    //use App\Http\Controllers\Backend\BlogController;

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

Route::get('/', [BlogController::class, 'index',
])->name('blog');

Route::get('/blog/{post}', [BlogController::class, 'show',
])->name('blog.show');

Route::post('/blog/{post}/comments', [CommentsController::class, 'store'
])->name('blog.comments');

Route::get('/category/{category}', [BlogController::class, 'category',
])->name('category');

Route::get('/author/{author}', [BlogController::class, 'author',
])->name('author');

Route::get('/tag/{tag}', [BlogController::class, 'tag',
])->name('tag');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');
//Route::post('/logout', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('home');
Route::get('/edit-account', [App\Http\Controllers\Backend\HomeController::class, 'edit'])->name('home');
Route::put('/edit-account', [App\Http\Controllers\Backend\HomeController::class, 'update'])->name('home');

Route::put('/backend/blog/restore/{blog}', [App\Http\Controllers\Backend\BlogController::class, 'restore',
])->name('backend.blog.restore');

Route::delete('/backend/blog/force-destroy/{blog}', [App\Http\Controllers\Backend\BlogController::class, 'forceDestroy',
])->name('backend.blog.force-destroy');

Route::resource('/backend/blog',  App\Http\Controllers\Backend\BlogController::class, ['as' => 'backend']);

Route::resource('/backend/categories',  App\Http\Controllers\Backend\CategoriesController::class, ['as' => 'backend']);

Route::get('/backend/users/confirm/{users}', [App\Http\Controllers\Backend\UsersController::class, 'confirm',
])->name('backend.blog.confirm');

Route::resource('/backend/users',  App\Http\Controllers\Backend\UsersController::class, ['as' => 'backend']);

Route::resource('/backend/tags', App\Http\Controllers\Backend\TagsController::class, ['as' => 'backend']);

//Route::get('contact', [ContactController::class, 'show'])->name('show');
//Route::post('contact', [ContactController::class, 'send'])->name('contact.send');
//Route::resource('/backend/contact', App\Http\Controllers\Backend\ContactController::class, ['as' => 'backend']);
Route::get('/backend/contact', [App\Http\Controllers\Backend\ContactController::class, 'show'])->name('contact.show');
Route::post('/backend/contact', [App\Http\Controllers\Backend\ContactController::class, 'store'])->name('contact.store');
