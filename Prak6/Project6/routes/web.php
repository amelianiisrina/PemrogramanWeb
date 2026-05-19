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

