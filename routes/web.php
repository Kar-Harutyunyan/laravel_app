<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


// Route::middleware('')->group(function(){
  Route::get('/register', [AuthController::class,'showRegister'])->name('auth.showRegister');
  Route::post('/register', [AuthController::class,'register'])->name('auth.register');
  Route::get('/login', [AuthController::class,'showLogin'])->name('auth.showLogin');
  Route::post('/login', [AuthController::class,'login'])->name('auth.login');
  Route::delete('/logout', [AuthController::class,'logout'])->name('logout');
  Route::get('/', [PostController::class, 'index'])->name('posts');


  Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
  Route::get('create-post/', [PostController::class, 'createPost'])->name('posts.create');
  Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
  Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
  Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
  Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
// });
