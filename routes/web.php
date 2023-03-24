<?php
namespace App\Http\Controllers;

use App\Http\Controllers\PostComment;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PostController::class, 'index'])->name('home');
// DB::listen(function($query){
//     logger($query->sql, $query->bindings);
// });

//    return view('posts', [   //category and author are the relationships(hasmany, belongsto) that we explicitly made
//     'posts' => Post::latest()->get(), //to fix the n+1 problem of queerying everything one by one
//     'categories' => Category::all()

// Route::get('/', function () {
//     return view('posts', [
//         'posts' => Post::all()
//     ]);
// });

//for route model binding to work, Wildcard and the parameter variable should have the same name.

// Route::get('categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'posts' => $category->post,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// });

// Route::get('?authors={author:username}', function(User $author){
//     return view('posts', [
//         'posts' => $author->post,
//         'categories' => Category::all()
//     ]);
// });

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('category');
Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store'])->middleware('auth');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//
Route::middleware('can:admin')->group(function() {
    Route::get('admin/posts/create', [PostController::class, 'create']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts', [AdminPostController::class, 'index' ]);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}',[AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'delete']);
});

// restful resource index, show, create, store,edit, update, destroy

