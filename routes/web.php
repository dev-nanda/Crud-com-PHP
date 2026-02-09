<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'index']);


Route::resource('products', ProductController::class);

Route::get('/admin', function () {
    return "Painel secreto 😎";
})->middleware('admin');

Route::get('/login-admin', function () {

    session(['admin' => true]);

    return "Virou admin 😎";
});
