<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\PostCommentController;

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


Route::resource('dashboard/post', PostController::class);
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/user', UserController::class);

Route::post('dashboard/post/{post}/image',[PostController::class,'image'])->name('post.image');
Route::get('dashboard/post/image-download/{image}',[PostController::class,'imageDownload'] )->name('post.image-download');
Route::delete('dashboard/post/image-delete/{image}',[PostController::class,'imageDelete'] )->name('post.image-delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('check.age');
Route::get('/detail/{id}', [App\Http\Controllers\web\WebController::class, 'detail']);
Route::get('/post-category/{id}', [App\Http\Controllers\web\WebController::class, 'post_category']);

Route::get('/',[WebController::class,'index'])->name('index');

Route::get('/contact',[WebController::class,'contact'])->name('contact');

Route::get('/categories',[WebController::class,'index'])->name('categories');

Route::resource('dashboard/contact', ContactController::class)->only(['index','show','destroy']);

Route::resource('dashboard/post-comment', PostCommentController::class)->only(['index','show','destroy']);

Route::get('dashboard/post-comment/{post}/post', [PostCommentController::class, 'post'])->name('post-comment.post');
Route::get('dashboard/post-comment/j-show/{postComment}', [PostCommentController::class, 'jshow']);


