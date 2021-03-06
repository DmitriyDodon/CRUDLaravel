<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::get('/', [ CategoryController::class, 'show']);
Route::get('/category', [ CategoryController::class, 'show']);
Route::get('/category/create', [ CategoryController::class, 'create']);
Route::post('/category/create', [ CategoryController::class, 'store']);
Route::get('/category/{category}/edit', [ CategoryController::class, 'edit']);
Route::post('/category/{category}/edit', [ CategoryController::class, 'update']);
Route::get('category/{category}/delete' , [CategoryController::class , 'delete']);




Route::get('/tag', [ TagController::class, 'show']);
Route::get('/tag/create', [ TagController::class, 'create']);
Route::post('/tag/create', [ TagController::class, 'store']);
Route::get('/tag/{tag}/edit', [ TagController::class, 'edit']);
Route::post('/tag/{tag}/edit', [ TagController::class, 'update']);
Route::get('/tag/{tag}/delete' , [TagController::class , 'delete']);

Route::get('/post', [ PostController::class, 'show']);
Route::get('/post/create', [ PostController::class, 'create']);
Route::post('/post/create', [ PostController::class, 'store']);
Route::get('/post/{post}/edit', [ PostController::class, 'edit']);
Route::post('/post/{post}/edit', [ PostController::class, 'update']);
Route::get('/post/{post}/delete' , [PostController::class , 'delete']);



