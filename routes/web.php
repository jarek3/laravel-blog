<?php

	use App\Http\Controllers\BlogController;
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
