<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\showController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post/create',[PostController::class,'create'])->name(name:"post.create");

Route::post('/posts',[PostController::class,'store'])->name(name:"posts.store");


Route::get('/posts', [PostController::class,'index'])->name(name:'allPosts'); //view

Route::get('/posts/{post}',[PostController::class,'show'])->name(name:'posts.show');

Route::put('/{post}',[PostController::class,'update'])->name(name:'post.update');

Route::delete('/{postId}',[PostController::class,'destroy'])->name(name:'destroy.post');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name(name:"post.edit");

