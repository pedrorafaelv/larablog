<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\dashboard\PostController;
use App\Http\controllers\dashboard\CategoryController;
use App\Http\controllers\dashboard\UserController;
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
    return view('welcome')->name('home');
});
Route::get('/hola/{nombre}', function ($nombre) {
    return "welcome: $nombre";
});


Route::get('home/{nombre?}/{apellido?}', function($nombre= "Pepe") {
   // return view('home')->with("nombre", $nombre)->with("apellido", $apellido);
   $posts=['post1','post2','post3','post4'];
   $posts2=[];
   return view("home",['nombre'=>$nombre, 'apellido' =>"Velasquez", 'posts' =>$posts, 'posts2' =>$posts2]);
})->name("home");


Route::group(['prefix' => 'dashboard'], function() {
   
       Route::resource('post', PostController::class);
       
       Route::resource('category', CategoryController::class);
       
       Route::resource('user', UserController::class);
    });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('dashboard/post/{post}/image', [App\Http\Controllers\dashboard\PostController::class, 'image'])->name('post.image');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
