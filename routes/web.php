<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('users', UserController::class)->middleware('auth');




Route::get('/home',function(){
    return view ('users.home');
})->name('home')->middleware('auth');

Route::get('/inactive',function(){
    return view ('users.inactive');
})->middleware('auth');
Route::get('logout',[AuthenticationController::class,'destroy'])->name('logout');
Route::get('login',[AuthenticationController::class,'login'])->name('login')->middleware('guest');
Route::post('login',[AuthenticationController::class,'Post_login'])->name('post_login')->middleware('guest');

Route::get('/unadded' ,[UserController::class , 'unadded'])->name('users.unadded');
Route::get('/inactive' ,[UserController::class , 'inactive'])->name('users.inactive');
Route::get('/makeactive/{id}' ,[UserController::class , 'makeactive'])->name('users.makeactive');
// Route::get('/makeinactive/{id}' ,[UserController::class , 'makeinactive'])->name('users.makeinactive');
Route::get('/added' ,[UserController::class , 'added'])->name('users.added');
Route::get('/addb/{id}' ,[UserController::class , 'addb'])->name('users.addb');
Route::put('/storeb/{id}',[UserController::class,'storeb'])->name('users.storeb');
Route::get('/delbook/{id}' ,[UserController::class , 'delbook'])->name('users.delbook');

