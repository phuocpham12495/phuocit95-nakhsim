<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibleVerseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginUserController;

Route::view("/", "home");

Route::view("/football", "football")->middleware("auth");

Route::view("/about", "about");

Route::view("/contact", "contact");

//Bible Verse
// Route::resource('bibleverses', BibleVerseController::class)->middleware("auth");
Route::get('/bibleverses', [BibleVerseController::class, "index"])->middleware("auth");
Route::get('/bibleverses/create', [BibleVerseController::class, "create"])->middleware("auth");
Route::get('/bibleverses/{bibleverse}', [BibleVerseController::class, "show"])->middleware("auth");
Route::post('/bibleverses', [BibleVerseController::class, "store"])->middleware("auth");
Route::get('/bibleverses/{bibleverse}/edit', [BibleVerseController::class, "edit"])->middleware("auth")->can("edit", "bibleverse");
Route::patch('bibleverses/{bibleverse}', [BibleVerseController::class, "update"])->middleware("auth")->can("update", "bibleverse");
Route::delete('/bibleverses/{bibleverse}', [BibleVerseController::class, "destroy"])->middleware("auth")->can("delete", "bibleverse");

//Post
Route::get('/posts', [PostController::class, "index"])->middleware("auth");
Route::get('/posts/create', [PostController::class, "create"])->middleware("auth");
Route::get('/posts/{post}', [PostController::class, "show"])->middleware("auth");
Route::post('/posts', [PostController::class, "store"])->middleware("auth");
Route::delete('/posts/{post}', [PostController::class, "destroy"])->middleware("auth")->can("delete", "post");

//Comment
Route::post('/comments', [CommentController::class, "store"])->middleware("auth");
Route::delete('/comments/{comment}', [CommentController::class, "destroy"])->middleware("auth")->can("delete", "comment");

//Auth
Route::get("/register", [RegisterUserController::class, "create"]);
Route::post("/register", [RegisterUserController::class, "store"]);
Route::get("/login", [LoginUserController::class, "create"])->name("login"); // ->name("login") for auth if is not auth redirect this name
Route::post("/login", [LoginUserController::class, "store"]);
Route::post("/logout", [LoginUserController::class, "destroy"]);

//Profile
Route::view("/profile", "profile")->middleware("auth");

//API
Route::get('/api/v1/post/{post}', [PostController::class, "exposeAPI"])->middleware("auth")->can("exposeAPI", "post");
Route::get('/api/v1/comment/{comment}', [CommentController::class, "exposeAPI"])->middleware("auth")->can("exposeAPI", "comment");
