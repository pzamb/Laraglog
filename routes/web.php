<?php

use App\Http\Controllers\dashboard\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home/{nom}?', function ($nom='Pedro') {
    return view('home',["nombre"=>$nom,'name'=>'Verónica']);
});

//Route::get('post',[PostController::class,'index']);

/*
Route::prefix('admin')->group(function () {
    
    Route::resource('post', PostController::class);
});

*/

Route::resource('dashboard/post', PostController::class);