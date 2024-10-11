<?php

USE App\Controllers\Controller;
USE App\Controllers\AuthController;

USE App\Controllers\AuthorController;
USE App\Controllers\GenreController;
USE App\Controllers\BookController;
USE App\Routes\Route;

// Main
Route::get('/',[Controller::class,'author']);
Route::get('/genre',[Controller::class,'genre']);
Route::get('/book',[Controller::class,'book']);


// Author
Route::get('/create_author_page',[AuthorController::class,'create_author_page']);
Route::post('/create_author',[AuthorController::class,'create_author']);

Route::post('/delete_author',[AuthorController::class,'delete_author']);

Route::post('/edit_author_page',[AuthorController::class,'edit_author_page']);
Route::post('/edit_author',[AuthorController::class,'edit_author']);


// Genres
Route::get('/create_genre_page',[GenreController::class,'create_genre_page']);
Route::post('/create_genre',[GenreController::class,'create_genre']);

Route::post('/delete_genre',[GenreController::class,'delete_genre']);

Route::post('/edit_genre_page',[GenreController::class,'edit_genre_page']);
Route::post('/edit_genre',[GenreController::class,'edit_genre']);



// Books
Route::get('/create_book_page',[BookController::class,'create_book_page']);
Route::post('/create_book',[BookController::class,'create_book']);

Route::post('/delete_book',[BookController::class,'delete_book']);

Route::post('/edit_book_page',[BookController::class,'edit_book_page']);
Route::post('/edit_book',[BookController::class,'edit_book']);



//Auth
Route::get('/login',[AuthController::class,'login_page']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'register_page']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/logout',[AuthController::class,'logout']);


?>