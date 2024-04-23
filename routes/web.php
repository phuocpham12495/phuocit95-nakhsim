<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BibleVerseController;

Route::view("/", "home");

Route::view("/about", "about");

Route::view("/contact", "contact");

Route::resource('bibleverses', BibleVerseController::class);
