<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo', function(){
    return "Hello World";});

Route::get('/user', [UserController::class, 'index']);

Route::get('/', function() {
    return 'Selamat Datang di Laravel';
});

Route::get('/products', 
    [ProductController::class, 'index']);